<?php

namespace AtlassianApiClient\Bamboo\Client\Factory;

use AtlassianApiClient\Bamboo\Client\BambooClient;

class BambooClientFactory
{
    /**
     * @param string $url
     * @param string $username
     * @param string $password
     *
     * @return BambooClient
     */
    public static function create($url, $username = null, $password = null)
    {
        $params = [
            'base_uri' => $url,
        ];

        if ($username !== null && $password !== null) {
            $params['auth'] = [
                $username,
                $password,
            ];
        }

        $httpClient = new \GuzzleHttp\Client($params);

        return new BambooClient($httpClient);
    }
}