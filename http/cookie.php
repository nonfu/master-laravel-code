<?php
// 获取 Cookie
if (isset($_GET['action']) && $_GET['action'] == 'get_cookies') {
    $name = $_COOKIE['name'];
    $website = $_COOKIE['website'];
    printf('从用户请求中读取的 Cookie 数据：{name: %s, website: %s}', $name, $website);
    exit();
}
// 更新 Cookie
if (isset($_GET['action']) && $_GET['action'] == 'set_cookies') {
    $expires = time() + 3600 * 24;
    setcookie('name', '学院君', $expires);  // 设置过期时间为 1 天
    echo '更新 Cookie 成功';
    exit();
}

// 删除 Cookie
if (isset($_GET['action']) && $_GET['action'] == 'del_cookies') {
    $expires = time() - 1;
    setcookie('website', '', $expires);   // 通过设置过期时间为过去的时间让客户端主动删除对应 Cookie
    echo '删除 Cookie：website';
    exit();
}

// 首次访问添加 Cookie
setcookie('name', '学院君');
$expires = time() + 3600;
setcookie('website', 'https://xueyuanjun.com', $expires); // 1 小时后过期

header('Location: /cookie.php?action=get_cookies');
