<?php
namespace App\Http;

class Router
{
    protected static $routes = [];

    public function register($route, $callback)
    {
        if (isset(self::$routes[$route])) {
            return;
        }
        self::$routes[$route] = $callback;
    }

    public function dispatch(Request $request)
    {
        $path = $request->getPath();
        if (!isset(self::$routes[$path])) {
            // 未定义路由重定向到首页
            $response = new Response('', 301, ['Location' => '/']);
            $response->prepare($request)->send();
            exit();
        }
        $callback = self::$routes[$path];
        call_user_func($callback, $request);
    }
}
