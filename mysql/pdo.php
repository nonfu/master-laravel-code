<?php

// 设置连接属性
$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=test;charset=utf8mb4';
$user = 'root';
$pass = 'root';

try {
    // 建立连接
    $pdo = new PDO($dsn, $user, $pass);
    // 执行 SQL 查询
    $res = $pdo->query('SELECT * FROM `post` ORDER BY `id` DESC');
    // 打印查询结果
    echo '<pre>';
    foreach ($res as $row) {
        print_r($row);
    }
} catch (PDOException $exception) {
    // 如果数据库操作出现异常，则捕获并打印
    printf("Error: %s\n", $exception->getMessage());
} finally {
    // 释放 PDO 连接实例
    $pdo = null;
}