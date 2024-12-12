<?php
namespace Inmovilla\ApiClient;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

class ApiClientFactory
{
    public static function createFromConfig(
        ApiClientConfig $config,
        ClientInterface $httpClient,
        RequestFactoryInterface $requestFactory
    ): ApiClientInterface {
        return new ApiClient(
            $config->getAgency(),
            $config->getPassword(),
            $config->getLanguage(),
            $config->getApiUrl(),
            $config->getDomain(),
            $httpClient,
            $requestFactory
        );
    }

    public static function createFromIniFile(
        string $configFile,
        ClientInterface $httpClient,
        RequestFactoryInterface $requestFactory
    ): ApiClientInterface {
        $config = ApiClientConfig::fromIniFile($configFile);
        return self::createFromConfig($config, $httpClient, $requestFactory);
    }
}