<?php
namespace App\Controller;

use App\Core\Container;
use App\Http\Request;
use App\Store\StoreContract;

class Controller
{
    /**
     * @var StoreContract
     */
    protected $connection;

    /**
     * @var Container
     */
    protected $container;

    /**
     * @var Request
     */
    protected $request;

    public function __construct()
    {
        $this->container = Container::getInstance();
        $store = $this->container->resolve(StoreContract::class);
        $this->connection = $store->newConnection();
        $this->request = $this->container->resolve('request');
    }
}