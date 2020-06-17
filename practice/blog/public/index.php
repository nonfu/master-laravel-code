<?php
require_once __DIR__ . '/../vendor/autoload.php';
$container = require_once __DIR__ . '/../app/bootstrap.php';

$store = $container->resolve(\App\Store\StoreContract::class);
$connection = $store->newConnection();
// 路由分发
if ($_SERVER['REQUEST_URI'] == "/") {
    $albums = $connection->table('albums')->selectAll();
    include __DIR__  . "/../views/home.php";
} elseif (strpos($_SERVER['REQUEST_URI'], '/album') === 0) {
    if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
        echo '请指定要访问的专辑 ID';
        exit();
    }
    $id = intval($_GET['id']);
    $album = $connection->table('albums')->select($id);
    $posts = $connection->table('posts')->selectByWhere(['album_id' => $id]);
    include __DIR__  . '/../views/album.php';
} elseif (strpos($_SERVER['REQUEST_URI'], '/post') === 0) {
    if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
        echo '请指定要访问的文章 ID';
        exit();
    }
    $id = intval($_GET['id']);
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
    header('Location: /');  // 其他无效路由都重定向到首页
}
