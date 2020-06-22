<?php
namespace App\View\Engine;

interface ViewEngine
{
    public function extract($path, $data): string;
}