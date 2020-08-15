<?php

header("Access-Control-Allow-Origin: *");
header( "Access-Control-Allow-Headers: *");

require '../vendor/autoload.php';
require '../bootstrap.php';

// Start the routing
use App\Router;
use App\Singleton\Container;

/**
 * The default namespace for route-callbacks, so we don't have to specify it each time.
 * Can be overwritten by using the namespace config option on your routes.
 */
Router::setDefaultNamespace('\App\Controller');
Container::getInstance()->setEntityManager($entityManager);

// Start the routing
Router::start();