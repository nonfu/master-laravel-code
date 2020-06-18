<?php
$router = new \App\Http\Router();

$store = $container->resolve(\App\Store\StoreContract::class);
$connection = $store->newConnection();
$request = $container->resolve('request');

$router->register('/', function () use ($container, $connection) {
    $albums = $connection->table('albums')->selectAll();
    include __DIR__  . "/../../views/home.php";
});

$router->register('album', function () use ($container, $request, $connection) {
    $id = intval($request->get('id'));
    if (empty($id)) {
        echo '请指定要访问的专辑 ID';
        exit();
    }
    $album = $connection->table('albums')->select($id);
    $posts = $connection->table('posts')->selectByWhere(['album_id' => $id]);
    include __DIR__  . '/../../views/album.php';
});

$router->register('post', function () use ($container, $request, $connection) {
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

return $router;

