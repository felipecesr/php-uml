<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/EntryPoint.php';

header('Content-type: application/json; charset=utf-8');

$route = $_SERVER['REQUEST_URI'];

$method = $_SERVER['REQUEST_METHOD'];

$routes = \App\Helpers\Config::get($route);

$entryPoint = new EntryPoint($route, $method, $routes);

$entryPoint->run();
