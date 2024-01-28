<?php

namespace Dark\Sdk\CoreAuth\Domain;

use Dark\Sdk\CoreAuth\Support\DarkCoreClient;

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
