<?php

$posts = [
    '1' => [
        'id' => 1,
        'album_id' => 1,
        'title' => '这是一篇测试文章1',
        'html' => <<<'HTML'
<h1 id="toc_0">这是一篇测试文章 1</h1>

<p><img src="https://qcdn.xueyuanjun.com/storage/uploads/images/gallery/2020-05/php-fullstack.jpg" alt="PHP全栈工程师"/></p>

<p>本系列教程包含 PHP 基础 + Laravel 框架 + Vue 框架 + 实战教程，旨在帮助你成长为合格的 PHP 全栈工程师。</p>

<p>教程明细在这里：<a href="https://xueyuanjun.com/books/php-fullstack">https://xueyuanjun.com/books/php-fullstack</a>。</p>
HTML,
        'text' => <<<'TEXT'
![PHP全栈工程师](https://qcdn.xueyuanjun.com/storage/uploads/images/gallery/2020-05/php-fullstack.jpg)

本系列教程包含 PHP 基础 + Laravel 框架 + Vue 框架 + 实战教程，旨在帮助你成长为合格的 PHP 全栈工程师。

教程明细在这里：<https://xueyuanjun.com/books/php-fullstack>。
TEXT,
        'created_at' => '2020-05-01'
    ],
    '2' => [
        'id' => 2,
        'album_id' => 1,
        'title' => '这是一篇测试文章2',
        'html' => <<<'HTML'
<h1 id="toc_0">这是一篇测试文章 1</h1>

<p><img src="https://qcdn.xueyuanjun.com/storage/uploads/images/gallery/2020-05/php-fullstack.jpg" alt="PHP全栈工程师"/></p>

<p>本系列教程包含 PHP 基础 + Laravel 框架 + Vue 框架 + 实战教程，旨在帮助你成长为合格的 PHP 全栈工程师。</p>

<p>教程明细在这里：<a href="https://xueyuanjun.com/books/php-fullstack">https://xueyuanjun.com/books/php-fullstack</a>。</p>
HTML,
        'text' => <<<'TEXT'
'![PHP全栈工程师](https://qcdn.xueyuanjun.com/storage/uploads/images/gallery/2020-05/php-fullstack.jpg)

本系列教程包含 PHP 基础 + Laravel 框架 + Vue 框架 + 实战教程，旨在帮助你成长为合格的 PHP 全栈工程师。

教程明细在这里：<https://xueyuanjun.com/books/php-fullstack>。
TEXT,
        'created_at' => '2020-05-08'
    ],
    '3' => [
        'id' => 3,
        'album_id' => 2,
        'title' => '这是一篇测试文章3',
        'html' => <<<'HTML'
<h1 id="toc_0">这是一篇测试文章 1</h1>

<p><img src="https://qcdn.xueyuanjun.com/storage/uploads/images/gallery/2020-05/php-fullstack.jpg" alt="PHP全栈工程师"/></p>

<p>本系列教程包含 PHP 基础 + Laravel 框架 + Vue 框架 + 实战教程，旨在帮助你成长为合格的 PHP 全栈工程师。</p>

<p>教程明细在这里：<a href="https://xueyuanjun.com/books/php-fullstack">https://xueyuanjun.com/books/php-fullstack</a>。</p>
HTML,
        'text' => <<<'TEXT'
![PHP全栈工程师](https://qcdn.xueyuanjun.com/storage/uploads/images/gallery/2020-05/php-fullstack.jpg)

本系列教程包含 PHP 基础 + Laravel 框架 + Vue 框架 + 实战教程，旨在帮助你成长为合格的 PHP 全栈工程师。

教程明细在这里：<https://xueyuanjun.com/books/php-fullstack>。
TEXT,
        'created_at' => '2020-05-28'
    ]
];

return $posts;
