<?php
/**
 * 初始化全局配置
 */
function initConfig()
{
    $config = require 'config/app.php';
    define("APP_NAME", $config['name']);
    define("APP_DESC", $config['desc']);
    define("APP_URL", $config['url']);
}

/**
 * 从数据源中获取数据
 * @param $driver
 * @param $fallback
 * @return mixed
 */
function getItemsFromStore($driver, $fallback) {
    $source = "store/${driver}.php";
    if (file_exists($source)) {
        return require $source;
    } else {
        return call_user_func($fallback);
    }
}
