<?php
namespace Inmovilla\ApiClient;

interface ApiClientInterface
{
    /**
     * Add a new request to the batch.
     *
     * @param string $type The type of request (e.g., 'paginacion', 'ficha', etc.)
     * @param int $startPosition The starting position for pagination.
     * @param int $numElements The number of elements to retrieve.
     * @param string $where Optional WHERE clause for filtering.
     * @param string $order Optional ORDER BY clause for sorting.
     */
    public function addRequest(string $type, int $startPosition, int $numElements, string $where = "", string $order = ""): void;

    /**
     * Send the accumulated requests to the API.
     *
     * @return array The API response.
     */
    public function sendRequest(): array;
}