<?php


namespace App\Service;


use Exception;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class ConfigurationService
{
    public static function get($parameter) {
        try {
            $configuration = Yaml::parseFile($_SERVER["DOCUMENT_ROOT"] . "/../config/config.yml");
            if (isset($configuration["parameters"][$parameter])) {
                return $configuration["parameters"][$parameter];
            } else {
                throw new Exception("Parameter not found", 1);
            }
        } catch (ParseException $exception) {
            printf('Unable to parse the configuration file: %s', $exception->getMessage());
        }
    }
}