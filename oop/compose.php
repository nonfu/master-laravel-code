<?php

interface CarContract
{
    public function drive();
}

abstract class BaseCar implements CarContract
{
    protected $brand;
    /**
     * @var Power
     */
    protected $power;

    public function __construct(Power $power, $brand)
    {
        $this->power = $power;
        $this->brand = $brand;
    }

    abstract public function drive();
}

class LynkCo01 extends BaseCar
{
    public function __construct(Power $power)
    {
        parent::__construct($power, '领克01');
    }

    public function drive()
    {
        echo "启动{$this->brand}汽车" . PHP_EOL;
        echo "动力来源: " . $this->power->power() . PHP_EOL;
    }
}

interface Power
{
    public function power();
}

class Gas implements Power
{
    public function power()
    {
        return "汽油";
    }
}

class Battery implements Power
{
    public function power()
    {
        return "电池";
    }
}

$battery = new Battery();
$lynk01 = new LynkCo01($battery);
$lynk01->drive();
echo "电力不足，自动切换为使用汽油作为动力来源..." . PHP_EOL;
$gas = new Gas();
$lynk01 = new LynkCo01($gas);
$lynk01->drive();


