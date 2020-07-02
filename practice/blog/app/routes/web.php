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

return $router;

