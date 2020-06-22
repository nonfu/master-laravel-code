<?php
namespace App\View\Engine;

class PhpEngine implements ViewEngine
{
    public function extract($path, $data): string
    {
        ob_start();

        extract($data, EXTR_SKIP);

        try {
            include $path;
        } catch (\Throwable $e) {
            throw new \Exception('解析视图模板出错:' . $e->getMessage());
        }

        return ltrim(ob_get_clean());
    }
}