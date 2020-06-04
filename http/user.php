<?php
session_save_path('./session');
session_start();

if (isset($_SESSION['user'])) {
    header('Content-Type: application/json');
    $user = $_SESSION['user'];
    echo json_encode($user);
} else {
    header('HTTP/1.1 401 Unauthorized');
    echo '登录后才能访问: <a href="login.php">立即登录</a>';
}
