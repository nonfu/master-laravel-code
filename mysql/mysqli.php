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
// $row = mysqli_fetch_row($res);
// $row = mysqli_fetch_assoc($res);

class Post
{
    public $id;
    public $title;
    public $content;
    public $created_at;

    public function __toString()
    {
        return '[#' . $this->id . ']' . $this->title . ':' . $this->content;
    }
}
// 将数据库返回结果映射到指定个对象
// $post = mysqli_fetch_object($res, Post::class);
// echo $post;


// 插入记录到数据库
$sql = 'INSERT INTO `post` (title, content, created_at) VALUES (?, ?, ?)';
// 构建预处理 SQL 语句
$stmt = mysqli_prepare($conn, $sql);

// 绑定参数值
$title = '这是一篇测试文章';
$content = '测试文章啊啊啊😂';
$created_at = '2020-05-27';
mysqli_stmt_bind_param($stmt, 'sss', $title, $content, $created_at);

// 执行 SQL 语句
mysqli_stmt_execute($stmt);

// 打印影响行数
printf("%d Row inserted.\n", mysqli_stmt_affected_rows($stmt));
// 获取插入记录对应的主键ID
$lastInsertId = mysqli_stmt_insert_id($stmt);

// 释放资源
mysqli_stmt_close($stmt);

// 查询新插入的记录
$sql = 'SELECT * FROM `post` WHERE id = ' . $lastInsertId;
$res = mysqli_query($conn, mysqli_escape_string($conn, $sql));
$post = mysqli_fetch_object($res, Post::class);
echo $post;

// 释放资源
mysqli_free_result($res);

// 关闭连接
mysqli_close($conn);
