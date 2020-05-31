<?php

class PrinterManager
{
    protected $container;
    protected $drivers;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function driver($driver = null)
    {
        if ($driver == null) {
            $driver = $this->container->resolve('app.editor');
        }
        if (isset($this->drivers[$driver])) {
            return $this->drivers[$driver];
        }
        $driverClass = ucwords($driver) . 'Printer';
        $factoryMethod = 'create' . $driverClass;
        if (!method_exists($this, $factoryMethod)) {
            throw new Exception("对应的渲染器驱动不支持！");
        }
        // 通过简单工厂模式创建驱动实例
        return $this->drivers[$driver] = call_user_func([$this, $factoryMethod]);
    }

    public function createHtmlPrinter()
    {
        require_once __DIR__ . '/HtmlPrinter.php';
        return new HtmlPrinter();
    }

    public function createMarkdownPrinter()
    {
        require_once __DIR__ . '/MarkdownAdapter.php';
        require_once __DIR__ . '/MarkdownParser.php';
        $markdown = new MarkdownParser();
        return new MarkdownAdapter($markdown);
    }

    public function __call($method, $arguments)
    {
        return $this->driver()->$method(...$arguments);
    }
}
