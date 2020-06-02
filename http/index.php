<?php

echo '<pre>';
//var_dump($_SERVER);
//var_dump($_GET);
//var_dump($_POST);

var_dump($_REQUEST);
$name = $_REQUEST['name'];
$password = $_REQUEST['password'];
$website = $_REQUEST['website'];
printf("用户名: %s, 密码: %s, 网站: %s\n", $name, $password, $website);
