<?php
namespace Inmovilla\ApiClient;

use InvalidArgumentException;

class ApiClientConfig
{
    private string $agency;
    private string $password;
    private int $language;
    private string $apiUrl;
    private string $domain;

    public function __construct(string $agency, string $password, int $language, string $apiUrl, string $domain)
    {
        if (empty($agency) || empty($password) || empty($apiUrl) || empty($domain)) {
            throw new InvalidArgumentException("All parameters are required and cannot be empty.");
        }

        $this->agency = $agency;
        $this->password = $password;
        $this->language = $language;
        $this->apiUrl = $apiUrl;
        $this->domain = $domain;
    }

    public static function fromArray(array $config): self
    {
        if (!isset($config['AGENCY'], $config['PASSWORD'], $config['LANGUAGE'], $config['API_URL'], $config['DOMAIN'])) {
            throw new InvalidArgumentException("Missing required parameters in the configuration.");
        }

        return new self(
            $config['AGENCY'],
            $config['PASSWORD'],
            (int)$config['LANGUAGE'],
            $config['API_URL'],
            $config['DOMAIN']
        );
    }

    public static function fromIniFile(string $configFile): self
    {
        if (!file_exists($configFile)) {
            throw new InvalidArgumentException("The configuration file does not exist: $configFile");
        }

        $config = parse_ini_file($configFile);

        if ($config === false) {
            throw new InvalidArgumentException("The configuration file could not be read: $configFile");
        }

        return self::fromArray($config);
    }

    public function getAgency(): string
    {
        return $this->agency;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getLanguage(): int
    {
        return $this->language;
    }

    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }
}