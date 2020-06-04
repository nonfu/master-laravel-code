<?php
session_save_path('./session');
session_start();
if (isset($_SESSION['name'])) {
    echo $_SESSION['name'];
    exit();
}
$_SESSION['name'] = '学院君';
