<?php

require __DIR__ . '/../vendor/autoload.php';

// Register routes
require __DIR__.'/../core/Router.php';
require __DIR__.'/../routes.php';
$router = new Router;
$router->setRoutes($routes);

$url = $_SERVER['REQUEST_URI'];

require __DIR__ . '/../resources/' . $router->getFileName($url);
