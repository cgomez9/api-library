<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use App\Service\ConfigurationService;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/app"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

// database configuration parameters
$conn = array(
    'driver' => ConfigurationService::get('driver'),
    'path' => __DIR__ . ConfigurationService::get('path'),
    'host' => ConfigurationService::get('host'),
    'dbname' => ConfigurationService::get('dbname'),
    'user' => ConfigurationService::get('user'),
    'password' => ConfigurationService::get('password'),
    'port' => ConfigurationService::get('port')
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);