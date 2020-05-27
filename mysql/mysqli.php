<?php

$host = '127.0.0.1';   // MySQL 服务器主机地址
$port = 3306;          // MySQL 服务器进程端口号
$user = 'root';         // 用户名
$password = 'root';     // 密码
$dbname = 'test';       // 使用的数据库名称

// 通过 mysqli 扩展建立与 mysql 服务器的连接
$conn = mysqli_connect($host, $user, $password, $dbname, $port);
mysqli_set_charset($conn, 'utf8mb4');

// 在连接实例上进行查询
$sql = 'SELECT * FROM `post` WHERE id = 1';
$res = mysqli_query($conn, $sql);

// 获取所有结果
/*
$rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
echo '<pre>';
var_dump($rows);*/

// 获取单条结果
$row = mysqli_fetch_row($res);
echo '<pre>';
var_dump($row);