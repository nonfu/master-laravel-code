<?php
include_once  __DIR__ . '/PrinterManager.php';

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
