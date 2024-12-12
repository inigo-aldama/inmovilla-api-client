<?php
namespace Inmovilla\ApiClient;

interface ApiClientInterface
{
    public function sendRequest(RequestBatch $batch): array;
}