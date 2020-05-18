<?php

interface CarContract
{
    public function drive();
}

abstract class BaseCar implements CarContract
{
    protected $brand;

    public function __construct($brand)
    {
        $this->brand = $brand;
    }

    abstract public function drive();
}

class LynkCo01 extends BaseCar
{
    public function __construct()
    {
        $this->brand = '领克01';
        parent::__construct($this->brand);
    }

    public function drive()
    {
        echo "启动{$this->brand}汽车" . PHP_EOL;
    }
}

class LynkCo03 extends BaseCar
{
    public function __construct()
    {
        $this->brand = '领克03';
        parent::__construct($this->brand);
    }

    public function drive()
    {
        echo "提示：手动档需要踩离合器" . PHP_EOL;
        echo "启动{$this->brand}汽车" . PHP_EOL;
    }
}

class TestCar
{
    public function testDrive(CarContract $car)
    {
        $car->drive();
    }
}

$lynkCo01 = new LynkCo01();
$lynkco03 = new LynkCo03();

$testCar = new TestCar();
$testCar->testDrive($lynkCo01);
echo "============================" . PHP_EOL;
$testCar->testDrive($lynkco03);

var_dump($lynkCo01 instanceof CarContract);
var_dump($lynkco03 instanceof BaseCar);

var_dump($testCar instanceof CarContract);
var_dump($testCar instanceof BaseCar);
