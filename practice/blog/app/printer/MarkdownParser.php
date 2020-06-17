<?php
namespace App\Printer;

class MarkdownParser implements MarkdownContract
{
    protected $parser;

    public function __construct()
    {
        $this->parser = new Parsedown();
    }

    public function parse($text):string
    {
        $this->parser->setSafeMode(true); // 转入不信任的输入，避免 XSS 攻击
        return $this->parser->text($text);
    }
}
