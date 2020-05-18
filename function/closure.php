<?php
// 计算两数相加
/*
$add = function () use ($n1, $n2) {
    return $n1 + $n2;
};
*/
// 计算两数相乘
/*
$multi = function () use ($n1, $n2){
    return $n1 * $n2;
};
*/

function add1($n1, $n2) {
    return function () use ($n1, $n2) {
        return $n1 + $n2;
    };
}

function add2() {
    return function () {
        global $n1, $n2, $n3;
        return $n1 + $n2 + $n3;
    };
}

function test() {
    printf("n1 = %d, n2 = %d, n3 = %d\n", $GLOBALS['n1'], $GLOBALS['n2'], $GLOBALS['n3']);
}

// 调用匿名函数
$n1 = 1;
$n2 = 3;
$n3 = 4;
$add = add1($n1, $n2);
$sum = $add();
echo "$n1 + $n2 = $sum" . PHP_EOL;

$add = add2();
$sum = $add();
echo "$n1 + $n2 + $n3 = $sum" . PHP_EOL;

test();



