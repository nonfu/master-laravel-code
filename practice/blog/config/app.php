<?php

return [
    'name' => '学院君的个人网站',
    'desc' => '让学习与进取者不再孤独',
    'url'  => 'https://xueyuanjun.com',
    'store' => [
        'default' => 'mysql',
        'drivers' => [
            'array' => [

            ],
            'mysql' => [
                'host' => '127.0.0.1',
                'port' => 3306,
                'dbname' => 'blog',
                'charset' => 'utf8mb4',
                'user' => 'root',
                'password' => 'root',
            ]
        ]
    ],
    'editor' => 'markdown',  // 支持html和markdown
    'providers' => [
        'store/StoreProvider.php',
        'printer/PrinterProvider.php'
    ]
];
