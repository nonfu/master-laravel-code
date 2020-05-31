<?php

class StoreManager
{
    protected $connections = [];
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function connection($driver = null)
    {
        if ($driver == null) {
            $driver = $this->container->resolve('app.store')['default'];
        }
        if (isset($this->connections[$driver])) {
            return $this->connections[$driver];
        }
        $driverClass = ucwords($driver) . 'Driver';
        $factoryMethod = 'create' . $driverClass;
        if (!method_exists($this, $factoryMethod)) {
            throw new Exception("对应的数据库驱动不支持！");
        }
        // 通过简单工厂模式创建驱动实例
        return $this->connections[$driver] = call_user_func([$this, $factoryMethod]);
    }

    protected function createArrayDriver()
    {
        require_once __DIR__ . '/array/ArrayDriver.php';
        return new ArrayDriver();
    }

    protected function createMysqlDriver()
    {
        throw new Exception('暂未实现 mysql 驱动');
    }

    public function __call($method, $arguments)
    {
        return $this->connection()->$method(...$arguments);
    }
}
