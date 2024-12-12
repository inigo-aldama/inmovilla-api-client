<?php

namespace Inmovilla\ApiClient;

class RequestBatch
{
    private array $requests = [];

    public function addRequest(Request $request): void
    {
        $this->requests[] = $request;
    }

    public function setRequests(array $requests): void
    {
        foreach ($requests as $request) {

            if (!$request instanceof Request) {
                throw new \InvalidArgumentException('All elements must be instances of Request.');
            }
        }
        $this->requests = $requests;
    }

    public function getRequests(): array
    {
        return $this->requests;
    }

    public function toArray(): array
    {
        return array_map(fn(Request $request) => $request->toArray(), $this->requests);
    }
}