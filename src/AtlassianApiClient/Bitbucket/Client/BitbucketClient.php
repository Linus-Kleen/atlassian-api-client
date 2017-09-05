<?php

namespace AtlassianApiClient\Bitbucket\Client;

use AtlassianApiClient\Bitbucket\Project\Factory\ProjectFactory;
use AtlassianApiClient\Bitbucket\Project\Project;
use AtlassianApiClient\Bitbucket\Repository\Factory\BranchFactory;
use AtlassianApiClient\Bitbucket\Repository\Factory\RepositoryFactory;
use AtlassianApiClient\Bitbucket\Repository\Repository;
use GuzzleHttp\Client;

/**
 * Class BitbucketClient
 * @package AtlassianApiClient\Bitbucket\Client
 */
class BitbucketClient
{
    /**
     * @var Client
     */
    private $httpClient;

    /**
     * BitbucketClient constructor.
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
        $response = $this->httpClient->get(
            '/rest/api/1.0/projects?limit=1000'
        )->getBody();

        $projects = ProjectFactory::createProjectsFromJson(
            $response->getContents()
        );

        return $projects;
    }

    /**
     * @param $key
     *
     * @return \AtlassianApiClient\Bitbucket\Repository\Repository[]
     */
    public function getRepositoriesByProjectKey($key)
    {
        $response = $this->httpClient->get(
            '/rest/api/1.0/projects/' . $key . '/repos'
        )->getBody();

        $repositories = RepositoryFactory::createRepositoriesFromJson(
            $response->getContents()
        );

        return $repositories;
    }

    public function getBranchesByRepository(Repository $repository)
    {
        $branches = [];
        $start = 0;

        do {
            var_dump($start);

            $response = $this->httpClient->get(
                '/rest/api/1.0/projects/'
                . $repository->getProject()->getKey() . '/repos/'
                . $repository->getSlug() . '/branches?limit=100&start=' . $start
            )->getBody()->getContents();

            $branches = array_merge(
                $branches,
                BranchFactory::createBranchesFromJson($response)
            );

            $data = json_decode($response);

//            print_r($data);
            if (isset($data->nextPageStart)) {
                $start = $data->nextPageStart;
            }

        } while ($data->isLastPage === false);

        return $branches;
    }
}