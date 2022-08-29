<?php
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

function logThis($msg) {
    $log = new Logger('name');
    $log->pushHandler(new StreamHandler(__DIR__.'/../example.log', Level::Warning));
    $log->warning($msg);
    exit;
}