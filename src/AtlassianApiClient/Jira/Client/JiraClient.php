<?php

namespace AtlassianApiClient\Jira\Client;

use AtlassianApiClient\Jira\Project\Factory\ProjectFactory;
use GuzzleHttp\Client;

/**
 * Class JiraClient
 * @package AtlassianApiClient\Jira\Client
 */
class JiraClient
{
    /**
     * @var Client
     */
    private $httpClient;

    /**
     * JiraClient constructor.
     * @param Client $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getProjects() {
        $response = $this->httpClient->get(
            '/rest/api/2/project?limit=1000'
        )->getBody();

        return ProjectFactory::createProjectsFromJson($response->getContents());
    }
}