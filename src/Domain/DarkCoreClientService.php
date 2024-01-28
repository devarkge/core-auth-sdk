<?php

namespace DevArk\Sdk\Auth\Domain;

use DevArk\Sdk\Auth\Support\DarkCoreClient;

class DarkCoreClientService
{
    public function __construct(
        private DarkCoreClient $darkCoreClient
    ) {
    }

    public function apiCall(string $url, array $params = [])
    {
        return $this->darkCoreClient->apiCall($url, $params);
    }
}
