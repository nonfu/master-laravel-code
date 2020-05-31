<?php
require_once __DIR__ . '/PrinterContract.php';

class HtmlPrinter implements PrinterContract
{
    public function render($content)
    {
        return $content;
    }
}
