<?php

return [
    'name' => '学院君的个人网站',
    'desc' => '让学习与进取者不再孤独',
    'url'  => 'https://xueyuanjun.com',
    'store' => [
        'default' => 'array',
        'drivers' => [
            'array' => [

            ],
            'mysql' => [

            ]
        ]
    ],
    'editor' => 'markdown',  // 支持html和markdown
    'providers' => [
        'store/StoreProvider.php',
        'printer/PrinterProvider.php'
    ]
];
