<?php

use App\Service\ProductService;
use App\Repository\ProductRepository;

$containerBuilder = new \DI\ContainerBuilder;

$containerBuilder->addDefinitions([
    ProductService::class => \DI\get(ProductService::class),
    ProductRepository::class => \DI\get(ProductRepository::class),
]);

$containerBuilder->ignorePhpDocErrors(true);

return $containerBuilder->build();
