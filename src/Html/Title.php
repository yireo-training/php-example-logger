<?php
namespace Academy\Html;

class Title
{
    public function html(string $text)
    {
        return '<h1>'.$text.'</h1>';
    }
}