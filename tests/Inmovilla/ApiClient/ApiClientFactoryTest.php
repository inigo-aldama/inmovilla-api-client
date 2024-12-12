<?php

namespace Inmovilla\Tests\ApiClient;

use Inmovilla\ApiClient\ApiClient;
use Inmovilla\ApiClient\ApiClientConfig;
use Inmovilla\ApiClient\ApiClientFactory;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\HttpFactory;

class ApiClientFactoryTest extends TestCase
{
    public function testCreateFromConfig(): void
    {
        $config = ApiClientConfig::fromArray([
            'AGENCY' => 'test-agency',
            'PASSWORD' => 'test-password',
            'API_URL' => 'https://api.test.com/v1',
            'DOMAIN' => 'test-domain',
            'LANGUAGE' => 1,
        ]);

        $httpClient = new GuzzleClient();
        $requestFactory = new HttpFactory();

        $apiClient = ApiClientFactory::createFromConfig($config, $httpClient, $requestFactory);

        $this->assertInstanceOf(ApiClient::class, $apiClient);
        $this->assertObjectHasProperty('apiUrl', $apiClient);
        $this->assertObjectHasProperty('domain', $apiClient);
        $this->assertObjectHasProperty('agency', $apiClient);
        $this->assertObjectHasProperty('password', $apiClient);
        $this->assertObjectHasProperty('language', $apiClient);
    }

    public function testCreateFromIniFile(): void
    {
        $iniFile = __DIR__ . '/../../fixtures/api_test_config.ini';
        $httpClient = new GuzzleClient();
        $requestFactory = new HttpFactory();

        $apiClient = ApiClientFactory::createFromIniFile($iniFile, $httpClient, $requestFactory);

        $this->assertInstanceOf(ApiClient::class, $apiClient);
    }
}