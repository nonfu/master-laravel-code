<?php
namespace App\View;

use App\Http\Response;
use App\View\Engine\ViewEngine;

class View
{
    /**
     * @var ViewEngine
     */
    protected $engine;
    /**
     * @var string
     */
    protected $basePath;

    public function __construct(ViewEngine $engine, $basePath)
    {
        $this->engine = $engine;
        $this->basePath = $basePath;
    }

    public function render($path, $data)
    {
        $response = new Response();
        try {
            $content = $this->getContent($path, $data);
        } catch (\Throwable $e) {
            $response->setStatusCode(500);
            $response->setContent($e->getMessage());
            $response->send();
            return;
        }
        $response->setContent($content);
        $response->setStatusCode(200);
        $response->send();
    }

    protected function getContent($path, $data): string
    {
        $path = $this->basePath . $path;
        if (!file_exists($path)) {
            throw new \Exception('对应的视图文件不存在!');
        }
        return $this->engine->extract($path, $data);
    }
}