<?php
require_once 'core/Container.php';

/**
 * 初始化全局配置
 */
function bootApp(Container $container)
{
    initConfig($container);
    registerProviders($container);
}

function initConfig(Container $container) {
    $config = require __DIR__ . '/config/app.php';
    $container->bind('app.name', $config['name']);
    $container->bind('app.desc', $config['desc']);
    $container->bind('app.url', $config['url']);
    $container->bind('app.store', $config['store']);
    $container->bind('app.editor', $config['editor']);
    $container->bind('app.providers', $config['providers']);
}

function registerProviders(Container $container) {
    $providers = $container->resolve('app.providers');
    foreach ($providers as $provider) {
        require_once $provider;
        $classname = basename($provider, '.php');
        $providerInstance = new $classname($container);
        $providerInstance->register();
    }
}

