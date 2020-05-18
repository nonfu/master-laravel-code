<?php

$nums = [2, 4, 8, 16, 32];
$lans = ['PHP', 'Golang', 'JavaScript'];

var_dump($nums);
var_dump($lans);

print_r($nums);
print_r($lans);

$fruits = [];
$fruits[] = 'Apple';
$fruits[] = 'Orange';
$fruits[] = 'Pear';

print_r($fruits);

$fruit = $fruits[0];
var_dump($fruit);

$fruits[2] = 'Banana';
unset($fruits[1]);

$fruits = array_values($fruits);

print_r($fruits);
var_dump($fruits[1]);

unset($fruits);
print_r($fruits);

$book = [
    'Laravel精品课',
    '学院君',
    2020,
    99.0,
    true
];

print_r($book);

$book = [
    'name' => 'Laravel精品课',
    'author' => '学院君',
    'publish_at' => 2020,
    'price' => 99.0,
    'published' => false
];

print_r($book);

$book = [
    'name' => 'Laravel精品课',
    'author' => '学院君',
    'publish_at' => 2020,
    'price' => 99.0,
    'published' => true,
    '掌握 Laravel 和 Vue 技术栈，成为合格的 PHP 全栈工程师！',
    'https://xueyuanjun.com/books/master-laravel',
];

print_r($book);

$book = [];
$book['name'] = 'Laravel精品课';
$book['author'] = '学院君';
$book['publish_at'] = 2020;
$book['price'] = 99.0;
$book['published'] = false;
$book['desc'] = '掌握 Laravel 和 Vue 技术栈，成为合格的 PHP 全栈工程师！';
$book['url'] = 'https://xueyuanjun.com/books/master-laravel';

$name = $book['name'];
var_dump($name);

$book['price'] = 199.0;
unset($book['url']);
print_r($book);
