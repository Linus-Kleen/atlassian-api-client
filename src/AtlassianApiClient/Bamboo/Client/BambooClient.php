<?php

namespace AtlassianApiClient\Bamboo\Client;

use AtlassianApiClient\Bamboo\Plan\Factory\PlanFactory;
use AtlassianApiClient\Bamboo\Project\Factory\ProjectFactory;
use AtlassianApiClient\Bamboo\Project\Project;
use GuzzleHttp\Client;

/**
 * Class BambooClient
 * @package AtlassianApiClient\Bamboo\Client
 */
class BambooClient
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
     * @return Project[]
     */
    public function getProjects()
    {
        $projects = [];

        $response = $this->httpClient->get(
            '/rest/api/latest/project',
            [
                'headers' => [
                    'Accept'     => 'application/json',
                ]
            ]
        )->getBody()->getContents();

        $projectData = json_decode($response, true);

        foreach ($projectData['projects']['project'] as $project) {
            $projects[] = ProjectFactory::createFromArray($project);
        }

        return $projects;
    }

    public function getPlans()
    {
        $response = $this->httpClient->get(
            '/rest/api/latest/plan',
            [
                'headers' => [
                    'Accept'     => 'application/json',
                ]
            ]
        )->getBody()->getContents();

        $plans = [];

        foreach (json_decode($response, true)['plans']['plan'] as $planData) {
            $plans[] = PlanFactory::createFromArray($planData);
        }

        return $plans;
    }
}