<?php

namespace Didikz\LaravelRajaongkir;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class LaravelRajaongkir
{
    protected $apiKey;
    protected $plan;
    protected $baseUrls = [
        'starter' => 'https://api.rajaongkir.com/starter'
    ];
    protected $responseData;

    public function __construct(string $apiKey, string $plan = 'starter')
    {
        $this->apiKey = $apiKey;
        $this->plan = $plan;
    }

    /**
     * @param string $uri
     * @param array $query
     * @param array $headers
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function getRequest(string $uri, array $query = [], array $headers = [])
    {
        try {
            $client = new Client();
            $response = $client->request('GET', $this->baseUrls[$this->plan] . $uri, [
                'headers' => array_merge([
                    'key' => $this->apiKey
                ], $headers),
                'query' => $query
            ]);
            $this->responseData = json_decode($response->getBody(), true)['rajaongkir']['results'];

        } catch (ClientException $clientException) {
            throw new \Exception('Client Error');
        }
    }

    /**
     * @param string $uri
     * @param array $params
     * @param array $headers
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function postRequest(string $uri, array $params = [], array $headers = [])
    {
        try {
            $client = new Client();
            $response = $client->request('POST', $this->baseUrls[$this->plan] . $uri, [
                'headers' => array_merge([
                    'content-type' => 'application/x-www-form-urlencoded',
                    'key' => $this->apiKey
                ], $headers),
                'form_params' => $params
            ]);
            $this->responseData = json_decode($response->getBody(), true)['rajaongkir']['results'];
        } catch (ClientException $clientException) {
            throw new \Exception('Client Error');
        }
    }
}
