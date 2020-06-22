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
                'driver' => 'mysql',
                'host' => '127.0.0.1',
                'port' => 3306,
                'database' => 'blog',
                'username' => 'root',
                'password' => 'root',
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_general_ci',
                'prefix'    => '',
            ]
        ]
    ],
    'editor' => 'markdown',  // 支持html和markdown
    'view.engine' => 'php',  // 视图模板引擎
    'view.path' => __DIR__ . '/../../resources/views/',  // 视图模板根路径
    'providers' => [
        //\App\Store\StoreProvider::class,
        \App\Printer\PrinterProvider::class,
        \App\View\ViewProvider::class,
    ]
];
