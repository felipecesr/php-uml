<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$container = require __DIR__ . '/../config/dependencies.php';

AppFactory::setContainer($container);
$app = AppFactory::create();

$routes = require __DIR__ . '/../config/routes.php';
$routes($app);

$app->run();
