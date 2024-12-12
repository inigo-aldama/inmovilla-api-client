
# Inmovilla API Client (Unofficial)

[![Latest Version](https://img.shields.io/badge/version-1.0.0-blue)]()
[![PHP](https://img.shields.io/badge/php-%5E7.4%20%7C%7C%20%5E8.0-blue)]()
[![License](https://img.shields.io/badge/license-MIT-green)](LICENSE)

`inmovilla-api-client` is a PHP library that provides an interface for interacting with the Inmovilla real estate API. It simplifies requests, pagination, and data handling, allowing developers to focus on building applications.

> **Note:** This project is not affiliated with, endorsed by, or maintained by Inmovilla.

---

## Features

- **API Configuration**: Easy setup using `.ini` files or arrays.
- **Request Handling**: Supports batch requests and flexible filtering.
- **DTOs**: Data transfer objects for working with API data in a structured way.
- **Pagination**: Handles paginated responses seamlessly.
- **PSR Compliance**: Built with PSR-7, PSR-11, and PSR-18 standards.

---

## Requirements

- **PHP**: 7.4 or higher.
- **Composer**: For dependency management.
- Required PHP extensions:
    - `ext-json`
    - `ext-curl`

---

## Installation

Install the package using Composer:
```bash
composer require inigo-aldama/inmovilla-api-client
```

---

## Configuration

### Using an `.ini` File
Create a configuration file (e.g., `config/api.ini`) with the following content:
```ini
api_url = "https://api.inmovilla.com/v1"
domain = "example.com"
agency = "my-agency"
password = "my-password"
language = 1
```

Load the configuration with:
```php
use Inmovilla\ApiClient\ApiClientConfig;

$config = ApiClientConfig::fromIniFile('config/api.ini');
```

### Using an Array
Alternatively, use an array for configuration:
```php
$config = ApiClientConfig::fromArray([
    'AGENCY' => 'my-agency',
    'PASSWORD' => 'my-password',
    'LANGUAGE' => 1,
    'API_URL' => 'https://api.inmovilla.com/v1',
    'DOMAIN' => 'example.com',
]);
```

---

## Example: Complete Flow

This example demonstrates how to retrieve cities, their zones, and properties associated with those zones, as well as fetch detailed property information.

```php
<?php

use Inmovilla\Repository\CiudadRepository;
use Inmovilla\Repository\ZonaRepository;
use Inmovilla\Repository\PropiedadRepository;
use Inmovilla\Repository\PropiedadFichaRepository;

$cities = $cityRepository->findAll();

foreach ($cities->items as $city) {
    $zones = $zoneRepository->findByCity($city->cod_ciu);

    foreach ($zones->items as $zone) {
        $properties = $propertyRepository->findByZone($zone->cod_zona);

        foreach ($properties->items as $property) {
            $details = $propertyDetailsRepository->findByCodOffer($property->cod_ofer);
        }
    }
}
```

---

## Extending a Repository

To add custom functionality to a repository, you can extend the base class and implement your own methods. Here’s an example of adding a method to fetch properties with an elevator:

```php
<?php

namespace Inmovilla\Repository;

use Inmovilla\DTO\Pagination\PaginacionPropiedadesDTO;

class CustomPropertyRepository extends PropiedadRepository
{
    public function findWithElevator(int $startPosition = 1, int $numElements = 100, string $order = 'precioinmo, precioalq'): PaginacionPropiedadesDTO
    {
        $where = $this->buildWhereClause(['ascensor' => 1]);
        $this->client->addRequest(PaginacionPropiedadesDTO::ARRAY_DATA_KEY, $startPosition, $numElements, $where, $order);
        return PaginacionPropiedadesDTO::fromArray($this->client->sendRequest());
    }
}
```

### Example Usage
```php
$customPropertyRepository = new CustomPropertyRepository($client);
$propertiesWithElevator = $customPropertyRepository->findWithElevator();

foreach ($propertiesWithElevator->items as $property) {
    echo "Property: Ref=" . $property->ref . PHP_EOL;
}
```

---

## Using the API Client Directly

If you want to bypass the repositories, you can use the API client directly to make custom requests:

```php
<?php

use Inmovilla\ApiClient\ApiClientConfig;
use Inmovilla\ApiClient\ApiClientFactory;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\HttpFactory;

$config = ApiClientConfig::fromIniFile('config/api.ini');
$httpClient = new GuzzleClient();
$requestFactory = new HttpFactory();

$client = ApiClientFactory::createFromConfig($config, $httpClient, $requestFactory);

$client->addRequest('properties', 1, 100, 'ascensor=1', 'precioinmo, precioalq');
$response = $client->sendRequest();

foreach ($response['properties'] as $property) {
    echo "Property: Ref=" . $property['ref'] . PHP_EOL;
}
```

---

## DTOs (Data Transfer Objects)

The library uses DTOs (Data Transfer Objects) to map API responses to structured PHP objects. Below are the key DTOs and their purposes:

### General DTOs

- **`CiudadDTO`**: Represents a city.
- **`ZonaDTO`**: Represents a zone within a city.

### Property DTOs

- **`PropiedadDTO`**: Represents a property in a property listing.
- **`PropiedadFichaDTO`**: Represents detailed information about a specific property. This is retrieved when querying property details using its offer code.

### Pagination DTOs

- **`PaginacionPropiedadesDTO`**: Handles paginated property listings.
- **`PaginacionCiudadesDTO`**: Handles paginated city data.
- **`PaginacionZonasDTO`**: Handles paginated zone data.
- **`PaginacionDestacadosDTO`**: Handles paginated "featured" properties.

---

## Testing

Run PHPUnit tests to validate functionality:
```bash
./vendor/bin/phpunit --testdox
```

---

## Contribution

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/new-feature`).
3. Commit your changes (`git commit -m 'Add new feature'`).
4. Push to your branch (`git push origin feature/new-feature`).
5. Open a pull request.

---

## License

This project is licensed under the [MIT License](LICENSE).

---

## Credits

- **Author**: Iñigo Aldama Gómez
- **Repository**: [inmovilla-api-client](https://github.com/inigo-aldama/inmovilla-api-client)
