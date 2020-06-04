<?php
session_save_path('./session');
session_start();

// 模拟数据库数据
$data = [
    [
        'id'  => 1,
        'name' => '测试账号',
        'password' => '123456'
    ],
    [
        'id'  => 2,
        'name' => '学院君',
        'password' => '123456'
    ]
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $password = $_POST['password'];
    if (empty($name) || empty($password)) {
        $error = '用户名/密码不能为空，请重试';
    } else {
        // 简单模拟用户名和密码是否匹配
        $user = array_filter($data, function ($item) use ($name, $password) {
            if ($item['name'] == $name && $item['password'] == $password) {
                return true;
            }
            return false;
        });
        if (!empty($user)) {
            $_SESSION['user'] = array_shift($user);
            header('Location: /user.php');
        } else {
            $error = '用户名/密码不正确，请重试';
        }
    }
}

include_once 'form.php';
