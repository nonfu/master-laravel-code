<?php
namespace App\Printer;

interface MarkdownContract
{
    public function parse($text):string;
}
