<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__.'/../vendor/autoload.php';

$app = new App\Application('dev');
$app['http_cache']->run();
