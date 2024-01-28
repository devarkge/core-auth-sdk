<?php

namespace Dark\Sdk\CoreAuth\Support;

use GuzzleHttp\Client;
use Dark\Sdk\CoreAuth\Support\Exceptions\DarkCoreException;

class DarkCoreClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . config('dark-auth.api_key'),
                ],
                'base_uri' => config('dark-auth.api_base'),
            ]
        );
    }

    /**
     * @throws DarkCoreException
     */
    public function apiCall(string $url, array $options = [])
    {
        try {
            $params = [
                'form_params' => $options,
            ];
            $response = $this->client->post($url, $params);
            $body = json_decode($response->getBody()->getContents(), true);
            return $body['data'];
        } catch(\Throwable $e) {
            throw new DarkCoreException($e->getMessage(), $e->getCode());
        }
    }
}
