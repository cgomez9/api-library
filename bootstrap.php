<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/configuration.yml"), $isDevMode);

// database configuration parameters
$conn = array(
    'driver' => 'pdo_pgsql',
    'path' => __DIR__ . '/db.pgsql',
    'host' => '127.0.0.1',
    'database' => 'library',
    'user' => 'carlosgomez',
    'password' => 'postgres',
    'port' => '5432'
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);