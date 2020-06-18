<?php
require_once __DIR__ . '/../vendor/autoload.php';
$container = require_once __DIR__ . '/../app/bootstrap.php';

$request = \App\Http\Request::capture();

$store = $container->resolve(\App\Store\StoreContract::class);
$connection = $store->newConnection();

// 路由分发，通过 Request 对象示例获取路径信息进行匹配
if ($request->getPath() == '/') {
    $albums = $connection->table('albums')->selectAll();
    include __DIR__  . "/../views/home.php";
} elseif ($request->getPath() == 'album') {
    $id = intval($request->get('id'));
    if (empty($id)) {
        echo '请指定要访问的专辑 ID';
        exit();
    }
    $album = $connection->table('albums')->select($id);
    $posts = $connection->table('posts')->selectByWhere(['album_id' => $id]);
    include __DIR__  . '/../views/album.php';
} elseif ($request->getPath() == 'post') {
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
    include __DIR__  . '/../views/post.php';
} else {
    // 改为通过 Response 对象发送重定向响应
    $response = new \App\Http\Response('', 301, ['Location' => '/']);
    $response->prepare($request)->send();
}
