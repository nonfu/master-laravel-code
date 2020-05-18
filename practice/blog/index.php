<?php
require_once 'bootstrap.php';

initConfig();

$driver = 'array';
$items = getItemsFromStore($driver, function () {
    return [
        [
            'title' => '首页',
            'url'   => 'https://xueyuanjuan.com'
        ]
    ];
});

include "views/home.php";
