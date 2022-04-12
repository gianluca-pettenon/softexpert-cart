<?php

require_once '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createUnsafeImmutable('../')->load();

(new \App\Core\RouterCore());
