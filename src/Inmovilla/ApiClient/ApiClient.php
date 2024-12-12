<?php

namespace Inmovilla\ApiClient;

use GuzzleHttp\Psr7\Utils;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Inmovilla\ApiClient\Exception\InvalidApiResponseException;
use Inmovilla\ApiClient\Exception\HttpRequestException;
use Throwable;

class ApiClient implements ApiClientInterface
{
    private string $apiUrl;
    private string $domain;
    private string $agency;
    private string $password;
    private int $language;
    private ClientInterface $httpClient;
    private RequestFactoryInterface $requestFactory;

    public function __construct(
        string                  $agency,
        string                  $password,
        int                     $language,
        string                  $apiUrl,
        string                  $domain,
        ClientInterface         $httpClient,
        RequestFactoryInterface $requestFactory
    )
    {
        $this->agency = $agency;
        $this->password = $password;
        $this->language = $language;
        $this->apiUrl = $apiUrl;
        $this->domain = $domain;
        $this->httpClient = $httpClient;
        $this->requestFactory = $requestFactory;
    }

    public function sendRequest(RequestBatch $batch): array
    {
        $params = $this->buildParams($batch);
        $responseJson = $this->makeRequest($params);
        $response = json_decode($responseJson, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new InvalidApiResponseException(
                "Invalid JSON response: " . json_last_error_msg() . ". Response: " . $responseJson
            );
        }

        return $response;
    }

    private function buildParams(RequestBatch $batch): string
    {

        $paramString = implode(';', [
            $this->agency,
            $this->password,
            $this->language,
            'lostipos'
        ]);

        foreach ($batch->getRequests() as $request) {
            $requestData = [
                $request->type,
                $request->startPosition,
                $request->numElements,
                $request->where,
                $request->order
            ];

            $paramString .= ';' . implode(';', $requestData);
        }

        return http_build_query([
            'param' => $paramString,
            'elDominio' => $this->domain,
            'json' => 1, // Mantén este valor seguro
            'ia' => $this->getClientIp()
        ]);
    }

    private function makeRequest(string $postFields): string
    {
        $request = $this->requestFactory->createRequest('POST', $this->apiUrl)
            ->withHeader('Accept', 'application/json')
            ->withHeader('Content-Type', 'application/x-www-form-urlencoded')
            ->withBody(Utils::streamFor($postFields));

        try {
            $response = $this->httpClient->sendRequest($request);

            if ($response->getStatusCode() !== 200) {
                throw new HttpRequestException(
                    "HTTP Error: " . $response->getStatusCode() .
                    ". Response: " . $response->getBody()->getContents()
                );
            }

            return $response->getBody()->getContents();
        } catch (Throwable $e) {
            throw new HttpRequestException("Request failed: " . $e->getMessage(), 0, $e);
        }
    }

    private function getClientIp(): string
    {
        $proxyHeaders = [
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'HTTP_CF_CONNECTING_IP',
        ];

        foreach ($proxyHeaders as $header) {
            if (isset($_SERVER[$header])) {
                $ips = explode(',', $_SERVER[$header]);
                foreach ($ips as $ip) {
                    $ip = trim($ip);
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                        return $ip;
                    }
                }
            }
        }

        return $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    }

}