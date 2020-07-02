<?php
namespace App;

use App\Core\Container;
use App\Http\Exception\ValidationException;
use App\Http\Response;
use App\Http\Session;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container as IlluminateContainer;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;

/**
 * 启动应用
 * @param Container $container
 * @return Container
 */
function bootApp(Container $container)
{
    registerExceptionHandler();
    initConfig($container);
    registerProviders($container);
    initDatabase($container);
    initSession($container);
    return $container;
}

// 初始化全局配置
function initConfig(Container $container) {
    $configs = require __DIR__ . '/config/app.php';
    foreach ($configs as $module => $config) {
        foreach ($config as $key => $val) {
            $container->bind($module . '.' . $key, $val);
        }
    }
}

// 注册服务提供者
function registerProviders(Container $container) {
    $providers = $container->resolve('app.providers');
    foreach ($providers as $provider) {
        $providerInstance = new $provider($container);
        $providerInstance->register();
    }
}

// 初始化数据库
function initDatabase(Container $container)
{
    $capsule = new Capsule();
    $dbConfig = $container->resolve('app.store');
    $capsule->addConnection($dbConfig['drivers'][$dbConfig['default']]);
    $capsule->setEventDispatcher(new Dispatcher(new IlluminateContainer));
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
}

function initSession(Container $container)
{
    // 启动 Session
    $handler = new NativeSessionStorage(['cookie_lifetime' => $container->resolve('session.lifetime')]);
    $session = new Session($handler);
    $session->start();
    $container->bind('session', $session);
}

// 注册全局异常处理器
function registerExceptionHandler()
{
    set_exception_handler(function (\Throwable $exception) {
        $response = new Response();
        if ($exception instanceof ValidationException) {
            $response->setStatusCode(422);
            $response->setContent($exception->getMessage());
        } else {
            $response->setStatusCode(500);
            $response->setContent( '服务器异常:' . $exception->getMessage());
        }
        $response->send();
    });
}

// 新增一个 IoC 容器，通过依赖注入获取对象实例
$container = Container::getInstance();
return bootApp($container);

