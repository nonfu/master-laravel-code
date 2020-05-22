<?php
// 浅拷贝
$engine = new stdClass();
$engine->num = 4;

$carA = new stdClass();
$carA->brand = '奔驰';
$carA->power = '汽油';
$carA->engine = $engine;

$carB = clone $carA;
$carB->brand = '领克02';
$carB->power = '电池';
$carB->engine->num = 3;

var_dump($carA);
var_dump($carB);

// 深拷贝
class Engine
{
    public $num = 4;
}

class Car
{
    public $brand;
    public $power;
    /**
     * @var Engine
     */
    public $engine;

    public function __clone()
    {
        $this->engine = clone $this->engine;
    }
}

$benz = new Car();
$benz->brand = '奔驰';
$benz->power = '汽油';
$engine = new Engine();
$benz->engine = $engine;

$lnykco02 = clone $benz;
$lnykco02->brand = '领克02';
$lnykco02->power = '电池';
$lnykco02->engine->num = 3;

var_dump($benz);
var_dump($lnykco02);
