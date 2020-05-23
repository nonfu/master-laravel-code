<?php
class IndexNotExistsException extends LogicException
{

}

function getItemFromBook($book, $key)
{
    if (empty($book)) {
        throw new InvalidArgumentException("数组为空！");
    }
    if (!key_exists($key, $book)) {
        throw new OutOfBoundsException("对应索引不存在！");
    }
    return $book[$key];
}

function myExceptionHandler(Exception $exception)
{
    echo 'Uncaught Exception [' . get_class($exception) . ']: ' . $exception->getMessage() . PHP_EOL;
    echo 'Thrown in ' . $exception->getFile() . ' on line ' . $exception->getLine() . PHP_EOL;
}

set_exception_handler('myExceptionHandler');

$book = [
    'title' => 'Laravel 精品课',
    'summary' => '彻底掌握 Laravel 和 Vue.js 框架，成为合格的 PHP 全栈工程师',
    'author' => '学院君',
    'price' => 99.0,
    'website' => 'https://xueyuanjun.com/books/master-laravel',
    'created_at' => '2020',
    'is_published' => false
];

try {
    $val = getItemFromBook($book, 'desc');
} catch (InvalidArgumentException $exception) {
    throw $exception;
} catch (OutOfBoundsException $exception) {
    throw $exception;
} finally {
    if (isset($val)) {
        var_dump($val);
    } else {
        echo '异常将通过全局异常处理器处理...' . PHP_EOL;
    }
}
