<?php

namespace AtlassianApiClient\Bitbucket\Client\Factory;

use AtlassianApiClient\Bitbucket\Client\BitbucketClient;

/**
 * Class BitbucketClientFactory
 * @package AtlassianApiClient\Bitbucket\Client\Factory
 */
class BitbucketClientFactory
{
    /**
     * @param string $url
     * @param string $username
     * @param string $password
     *
     * @return BitbucketClient
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

        return new BitbucketClient($httpClient);
    }
}