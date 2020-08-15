<?php

header("Access-Control-Allow-Origin: *");
header( "Access-Control-Allow-Headers: *");

require '../vendor/autoload.php';

// Start the routing
use Src\Router;

/**
 * The default namespace for route-callbacks, so we don't have to specify it each time.
 * Can be overwritten by using the namespace config option on your routes.
 */
Router::setDefaultNamespace('\Src\Controller');

// Start the routing
Router::start();