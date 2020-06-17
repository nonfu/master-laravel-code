<?php
namespace App\Store;

use App\Core\Container;

class StoreProvider
{
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function register()
    {
        $this->container->bind(StoreContract::class, function () {
            require_once __DIR__ . '/StoreManager.php';
            return new StoreManager($this->container);
        });
    }
}
