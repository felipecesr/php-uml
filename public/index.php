<?php

require_once __DIR__ . '/../vendor/autoload.php';

$route = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$routes = require __DIR__ . '/../config/routes.php';

var_dump(array_key_exists($route, $routes)); die;

$controller = new $routes[$route][$method]['controller']();
$action = $routes[$route][$method]['action'];

$controller->$action();
