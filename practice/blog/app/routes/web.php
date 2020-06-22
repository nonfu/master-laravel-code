<?php
$router = new \App\Http\Router();

$request = $container->resolve('request');

$router->register('get', '/', 'HomeController@index');

$router->register('get', 'album', 'AlbumController@list');

$router->register('get', 'post', 'PostController@show');

$router->register(['get', 'post'], 'login', function () use ($container,  $request) {
    $session = $container->resolve('session');
    if ($session->has('auth_user')) {
        // 用户已登录成功，跳转到首页
        $response = new \App\Http\Response('', 302, ['Location' => '/']);
        $response->prepare($request)->send();
        return;
    }
    if (strtolower($request->getMethod()) == 'get') {
        $error = '';
        include __DIR__  . '/../../views/login.php';
    } else {
        $name = $request->get('name');
        $password = $request->get('password');
        if (empty($name) || empty($password)) {
            $error = '用户名和密码不能为空';
            include __DIR__  . '/../../views/login.php';
            return;
        }
        $user = \App\Model\User::where('name', $name)->first();
        if ($user['password'] == md5($password)) {
            // 用户登录成功
            $session->set('auth_user', $user);
            // 跳转到首页
            $response = new \App\Http\Response('', 302, ['Location' => '/']);
            $response->prepare($request)->send();
            return;
        }
        // 返回到用户登录页面，并提示错误信息
        $error = '用户名和密码不匹配，请重试';
        include __DIR__  . '/../../views/login.php';
    }
});

return $router;

