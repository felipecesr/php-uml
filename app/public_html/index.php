<?php

require __DIR__ . '/../vendor/autoload.php';

// Instantiate the app
$app = new \Slim\App;

// Register routes
$routes = require __DIR__ . '/../resources/CategoriaResource.php';
$routes($app);

// Run app
$app->run();
