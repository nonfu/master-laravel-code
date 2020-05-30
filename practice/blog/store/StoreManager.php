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
        $driverName = ucwords($driver) . 'Driver.php';
        require_once __DIR__ . '/' . $driver . '/' . $driverName;
        $driverClass = basename($driverName, '.php');
        $this->connections[$driver] = new $driverClass;
        return $this->connections[$driver];
    }

    public function __call($method, $arguments)
    {
        return $this->connection()->$method($arguments);
    }
}
