<?php

class Gas
{
    public static $POWER = '汽油';
}

class Car
{
    protected static $WHEELS = 4;

    public static function getWheels()
    {
        return self::$WHEELS;
    }

    public static function getClassName()
    {
        return static::class;
    }

    public static function who()
    {
        echo static::getClassName() . PHP_EOL;
    }

    public static function printCar()
    {
        return sprintf("这辆车有 %d 个轮子，使用 %s 作为动力来源\n", self::$WHEELS, Gas::$POWER);
    }

    public function __toString()
    {
        return self::printCar();
    }
}

class LynkCo01 extends Car
{

}

echo Car::getClassName() . PHP_EOL;
echo LynkCo01::getClassName() . PHP_EOL;

Car::who();
LynkCo01::who();
