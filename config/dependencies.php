<?php

use App\Domain\Repository\ICategoryRepository;
use App\Infra\Persistence\ConnectionFactory;
use App\Infra\Repository\CategoryRepository;
use DI\ContainerBuilder;

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    ICategoryRepository::class => function () {
        $connection = ConnectionFactory::createConnection();
        return new CategoryRepository($connection);
    }
]);

$container = $containerBuilder->build();

return $container;
