<?php
namespace App\Http\Controller;

use App\Core\Container;
use App\Http\Request;
use App\Store\StoreContract;
use App\View\View;

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

    /**
     * @var View
     */
    protected $view;

    public function __construct()
    {
        $this->container = Container::getInstance();
        //$store = $this->container->resolve(StoreContract::class);
        //$this->connection = $store->newConnection();
        $this->request = $this->container->resolve('request');
        $this->view = $this->container->resolve('view');
    }
}
