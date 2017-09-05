<?php

namespace AtlassianApiClient\Jira\Client\Factory;

use AtlassianApiClient\Jira\Client\JiraClient;

/**
 * Class ClientFactory
 * @package AtlassianApiClient\Jira\Client\Factory
 */
class JiraClientFactory
{
    /**
     * @param string $url
     * @param string $username
     * @param string $password
     *
     * @return JiraClient
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

        return new JiraClient($httpClient);
    }
}