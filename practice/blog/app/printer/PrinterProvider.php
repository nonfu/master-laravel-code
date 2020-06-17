<?php
namespace App\Printer;

use App\Core\Container;

class PrinterProvider
{
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function register()
    {
        $this->container->bind(PrinterContract::class, function () {
            return new PrinterManager($this->container);
        });
    }
}
