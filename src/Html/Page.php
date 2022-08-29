<?php
namespace Academy\Html;

class Page
{
    public function html(string $title, string $content)
    {
        $html = '';
        $html .= (new Title)->html($title);
        $html .= (new Content)->html($content);
        return $html;
    }
}