<?php

$host = '127.0.0.1';   // MySQL 服务器主机地址
$port = 3306;          // MySQL 服务器进程端口号
$user = 'root';         // 用户名
$password = 'root';     // 密码
$dbname = 'test';       // 使用的数据库名称

// 通过 mysqli 扩展建立与 mysql 服务器的连接
$conn = mysqli_connect($host, $user, $password, $dbname, $port);

// 在连接实例上进行查询
$sql = 'SELECT * FROM `post`';
$res = mysqli_query($conn, $sql);

// 获取所有结果
$rows = mysqli_fetch_all($res);
var_dump($rows);

