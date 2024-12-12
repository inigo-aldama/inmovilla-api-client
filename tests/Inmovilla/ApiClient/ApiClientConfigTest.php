<?php

namespace Inmovilla\Tests\ApiClient;

use Inmovilla\ApiClient\ApiClientConfig;
use PHPUnit\Framework\TestCase;

class ApiClientConfigTest extends TestCase
{
    public function testLoadFromIniFile(): void
    {
        $config = ApiClientConfig::fromIniFile(__DIR__ . '/../../fixtures/api_test_config.ini');

        $this->assertEquals('test-agency', $config->getAgency());
        $this->assertEquals('test-password', $config->getPassword());
        $this->assertEquals('https://api.test.com/v1', $config->getApiUrl());
        $this->assertEquals('test-domain', $config->getDomain());
    }
}