<?php

trait Power
{
    protected $power;

    protected function gas()
    {
        $this->power = '汽油';
    }

    protected function battery()
    {
        $this->power = '电池';
    }

    public function printText()
    {
        echo "动力来源：" . $this->power . PHP_EOL;
    }
}

trait Engine
{
    protected $engine;

    protected function three()
    {
        $this->engine = 3;
    }

    protected function four()
    {
        $this->engine = 4;
    }

    public function printText()
    {
        echo "发动机个数：" . $this->engine . PHP_EOL;
    }
}

trait Component
{
    use Power, Engine {
        Engine::printText insteadof Power;
        Power::printText as printPower;
        Engine::printText as printEngine;
    }

    protected function init()
    {
        $this->gas();
        $this->four();
    }
}

class Car
{
    use Component;

    public function drive()
    {
        // 初始化系统
        $this->init();
        $this->printPower();
        $this->printEngine();
        echo "汽车启动..." . PHP_EOL;
    }
}

$car = new Car();
$car->drive();
