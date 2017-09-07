<?php

namespace AtlassianApiClient\Jira\Client;

use AtlassianApiClient\Jira\Issue\Factory\IssueFactory;
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

    /**
     * @return \AtlassianApiClient\Jira\Project\Project[]
     */
    public function getProjects() {
        $response = $this->httpClient->get(
            '/rest/api/2/project?limit=1000'
        )->getBody();

        return ProjectFactory::createProjectsFromJson($response->getContents());
    }

    /**
     * @param string $issueKey
     * @return \AtlassianApiClient\Jira\Issue\Issue
     */
    public function getIssueByKey($issueKey)
    {
        try {
            $response = $this->httpClient->get(
                '/rest/api/2/issue/' . $issueKey
            )->getBody()->getContents();

            return IssueFactory::createFromArray(json_decode($response, true));
        } catch (\Exception $e) {
            return null;
        }
    }
}