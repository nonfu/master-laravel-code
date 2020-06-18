<?php
$router = new \App\Http\Router();

$store = $container->resolve(\App\Store\StoreContract::class);
$connection = $store->newConnection();
$request = $container->resolve('request');

$router->register('get', '/', function () use ($container, $connection) {
    $albums = $connection->table('albums')->selectAll();
    include __DIR__  . "/../../views/home.php";
});

$router->register('get', 'album', function () use ($container, $request, $connection) {
    $id = intval($request->get('id'));
    if (empty($id)) {
        echo '请指定要访问的专辑 ID';
        exit();
    }
    $album = $connection->table('albums')->select($id);
    $posts = $connection->table('posts')->selectByWhere(['album_id' => $id]);
    include __DIR__  . '/../../views/album.php';
});

$router->register('get', 'post', function () use ($container, $request, $connection) {
    $id = intval($request->get('id'));
    if (empty($id)) {
        echo '请指定要访问的文章 ID';
        exit();
    }
    $post = $connection->table('posts')->select($id);
    $printer = $container->resolve(\App\Printer\PrinterContract::class);
    if ($container->resolve('app.editor') == 'markdown') {
        $post['content'] = $printer->driver('markdown')->render($post['text']);
    } else {
        $post['content'] = $printer->render($post['html']);
    }
    $pageTitle = $post['title'] . ' - ' . $container->resolve('app.name');
    $album = $connection->table('albums')->select($post['album_id']);
    include __DIR__  . '/../../views/post.php';
});

$router->register(['get', 'post'], 'login', function () use ($container,  $request, $connection) {
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
        $user = $connection->table('users')->selectByWhere(['name' => $name]);
        if ($user[0]['password'] == md5($password)) {
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

