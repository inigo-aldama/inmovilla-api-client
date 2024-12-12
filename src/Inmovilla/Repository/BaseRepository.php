<?php

namespace Inmovilla\Repository;

use Inmovilla\ApiClient\ApiClientInterface;
use Inmovilla\ApiClient\Request;
use Inmovilla\ApiClient\RequestBatch;

abstract class BaseRepository
{
    protected ApiClientInterface $client;
    protected RequestBatch $requestBatch;


    public function __construct(ApiClientInterface $client)
    {
        $this->client = $client;
        $this->requestBatch = new RequestBatch();
    }
    protected function addRequest(string $type, int $startPosition, int $numElements, string $where = '', string $order = ''): void
    {
        $this->requestBatch->addRequest(new Request($type, $startPosition, $numElements, $where, $order));
    }

    protected function sendRequests(): array
    {
        $response = $this->client->sendRequest($this->requestBatch);
        $this->requestBatch = new RequestBatch(); // Reset batch after sending
        return $response;
    }

    /**
     * Builds a WHERE clause in the format expected by the third-party API (key=value).
     *
     * To ensure security and prevent potential injection vulnerabilities, both keys and values
     * are sanitized before constructing the clause:
     *
     * - Keys are restricted to alphanumeric characters, underscores (_), and periods (.).
     * - Values are restricted to alphanumeric characters, spaces, underscores (_), hyphens (-),
     *   at symbols (@), and periods (.).
     *
     * While this approach aligns with the API's expected format, strict validation minimizes
     * the risk of malicious inputs. Additional logging and monitoring are recommended when
     * interfacing with third-party systems.
     */
    protected function buildWhereClause(array $criteria): string
    {
        return implode(' AND ', array_map(
            fn($key, $value) => sprintf('%s=%s', $this->sanitizeKey($key), $this->sanitizeValue($value)),
            array_keys($criteria),
            $criteria
        ));
    }

    protected function sanitizeValue(string $value): string
    {
        return preg_replace('/[^a-zA-Z0-9 _\-@.]/', '', $value);
    }

    protected function sanitizeKey(string $key): string
    {
        return preg_replace('/[^a-zA-Z0-9_.]/', '', $key);
    }
}