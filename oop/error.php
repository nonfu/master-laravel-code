<?php

// error_reporting(E_ALL);  // 报告所有错误（默认配置）
// error_reporting(E_ALL ^ E_WARNING);
// set_error_handler("myErrorHandler");
ini_set('display_errors', 0);

try {
    $content = file_get_contents('https://xueyuanjun.com/error');
} catch (Error $error) {
    var_dump($error);
}
var_dump($content);

/**
 * 自定义错误处理器
 * @param $errno int 错误级别
 * @param $errstr string 错误信息
 * @param $errfile string 错误文件
 * @param $errline  int   错误行号
 */
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    // 该级别错误不报告的话退出
    if (!(error_reporting() & $errno)) {
        return;
    }

    $logDir = __DIR__ . DIRECTORY_SEPARATOR . 'logs';
    if (!file_exists($logDir)) {
        mkdir($logDir);
    }
    $logFile = $logDir . DIRECTORY_SEPARATOR . 'err.log';
    switch ($errno) {
        case E_ERROR:
            error_log("致命错误: [$errno] $errstr", 3, $logFile);
            break;
        case E_WARNING:
            error_log("警告: [$errno] $errstr", 3, $logFile);
            break;
        case E_NOTICE:
            error_log("通知: [$errno] $errstr", 3, $logFile);
            break;
        default:
            echo "未知错误类型: [$errno] $errstr\n";
            break;
    }
}
