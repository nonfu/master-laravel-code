<?php
namespace App\Printer;

class HtmlPrinter implements PrinterContract
{
    public function render($content)
    {
        return $content;
    }
}
