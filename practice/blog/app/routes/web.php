<?php
$router = new \App\Http\Router();

$request = $container->resolve('request');

$router->register('get', '/', 'HomeController@index');
$router->register('get', 'about', 'HomeController@about');
$router->register(['get', 'post'], 'contact', 'HomeController@contact');

$router->register('get', 'album', 'AlbumController@list');
$router->register('get', 'post', 'PostController@show');

$router->register('get', 'admin', 'Admin\DashboardController@index');

$router->register(['get', 'post'], 'login', 'AuthController@login');
$router->register('post', 'logout', 'AuthController@logout');

$router->register('get', 'admin/albums', 'Admin\AlbumController@index');
$router->register('get', 'admin/posts', 'Admin\PostController@index');
$router->register('get', 'admin/messages', 'Admin\MessageController@index');

$router->register(['get', 'post'], 'admin/album/new', 'Admin\AlbumController@add');
$router->register(['get', 'post'], 'admin/album/edit', 'Admin\AlbumController@edit');
$router->register(['post'], 'admin/album/delete', 'Admin\AlbumController@delete');

$router->register(['get', 'post'], 'admin/post/new', 'Admin\PostController@add');
$router->register(['get', 'post'], 'admin/post/edit', 'Admin\PostController@edit');
$router->register(['post'], 'admin/post/delete', 'Admin\PostController@delete');

$router->register('post', 'admin/message/delete', 'Admin\MessageController@delete');

return $router;

