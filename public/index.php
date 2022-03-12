<?php

require_once '../vendor/autoload.php';
require_once '../App/Config/Config.php';

$dotenv = Dotenv\Dotenv::createUnsafeImmutable('../');
$dotenv->load();

(new \App\Core\RouterCore());
