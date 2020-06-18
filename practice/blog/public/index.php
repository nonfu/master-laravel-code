<?php
require_once __DIR__ . '/../vendor/autoload.php';
$container = require_once __DIR__ . '/../app/bootstrap.php';
$request = \App\Http\Request::capture();
$container->bind('request', $request);

$router = require_once __DIR__ . '/../app/routes/web.php';

// 路由分发，通过 Request 对象示例获取路径信息进行匹配
$router->dispatch($request);
