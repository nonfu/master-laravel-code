<?php
namespace App\Testing;
use App\Test as BaseTest;

class Test extends BaseTest
{
    public static function print()
    {
        printf("这里来自 Test 子类的打印结果: %s\n", __CLASS__);
    }
}

