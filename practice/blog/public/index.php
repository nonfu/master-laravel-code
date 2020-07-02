<?php
require_once __DIR__ . '/../vendor/autoload.php';
// 启动应用
$container = require_once __DIR__ . '/../app/bootstrap.php';

// 获取全局请求示例
$request = \App\Http\Request::capture();
$container->bind('request', $request);

// 注册路由
$router = require_once __DIR__ . '/../app/routes/web.php';

// 路由分发、处理请求、返回响应
$router->dispatch($request);
