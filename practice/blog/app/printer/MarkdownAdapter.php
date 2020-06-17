<?php
namespace App\Printer;

class MarkdownAdapter implements PrinterContract
{
    protected $markdown;

    public function __construct(MarkdownContract $markdown)
    {
        $this->markdown = $markdown;
    }

    public function render($content)
    {
        return $this->markdown->parse($content);
    }
}
