<?php
require_once 'bootstrap.php';

$container = Container::getInstance();
bootApp($container);

$store = $container->resolve(StoreContract::class);
$connection = $store->newConnection();
// 路由分发
if ($_SERVER['REQUEST_URI'] == "/") {
    $albums = $connection->table('albums')->selectAll();
    include "views/home.php";
} elseif (strpos($_SERVER['REQUEST_URI'], '/album') === 0) {
    if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
        echo '请指定要访问的专辑 ID';
        exit();
    }
    $id = intval($_GET['id']);
    $album = $connection->table('albums')->select($id);
    $posts = $connection->table('posts')->selectByWhere(['album_id' => $id]);
    include 'views/album.php';
} elseif (strpos($_SERVER['REQUEST_URI'], '/post') === 0) {
    if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
        echo '请指定要访问的文章 ID';
        exit();
    }
    $post = $connection->table('posts')->select(intval($_GET['id']));
    include 'views/post.php';
} else {
    header('Location: /');  // 其他无效路由都重定向到首页
}
