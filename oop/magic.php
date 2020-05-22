<?php

class Car
{
    protected $data;
    protected $brand;

    public function __call($name, $arguments)
    {
        echo "调用的成员方法不存在" . PHP_EOL;
    }

    public static function __callStatic($name, $arguments)
    {
        echo "调用的静态方法不存在" . PHP_EOL;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __invoke($brand)
    {
        $this->brand = $brand;
        echo "蓝天白云，定会如期而至 -- " . $this->brand . PHP_EOL;
    }
}

/*
$car = new Car();
$car->brand = '奔驰';
var_dump($car->brand);

$car->wheels = 4;
var_dump($car->wheels);
*/

$car = new Car();
$car('宝马');


