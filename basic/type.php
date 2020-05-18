<?php

$name = "Laravel 精品课";
$author = '学院君';
$publish_at = 2020;
$price = 99.0;
$published = false;

var_dump($name);
var_dump($author);
var_dump($publish_at);
var_dump($price);
var_dump($published);

if (is_string($name)) {
    //echo "\"$name\" 是字符串" . PHP_EOL;
    echo '"' . $name . '" 是字符串' . PHP_EOL;
}

if (is_string($author)) {
    //echo "'$author' 也是字符串" . PHP_EOL;
    echo '\'' . $author . '\' 是字符串' . PHP_EOL;
}

$publish_at = 2020;
var_dump($publish_at);

echo "当前系统 PHP 整型有效值范围: " . PHP_INT_MIN . '~' . PHP_INT_MAX . PHP_EOL;

$price = 0.99;
var_dump($price);

var_dump(($price + 0.01) / 10);

$published = false;
var_dump($published);


$str = "123";
$int = 2020;
$float = 99.0;
$bool = false;

var_dump((int) $str);
var_dump((bool) $str);
var_dump((string) $str);
var_dump((bool) $str);
var_dump((int) $float);
var_dump((string) $float);
var_dump((string) $bool);
var_dump((int) $bool);

$server = new swoole_http_server('127.0.0.1', 9501);
