<?php

namespace AtlassianApiClient\Bitbucket\Repository\Factory;

use AtlassianApiClient\Bitbucket\Repository\Hydrator\RepositoryHydrator;
use AtlassianApiClient\Bitbucket\Repository\Repository;

/**
 * Class RepositoryFactory
 * @package AtlassianApiClient\Bitbucket\Repository\Factory
 */
class RepositoryFactory
{
    /**
     * @param string $json
     *
     * @return Repository[]
     */
    public static function createRepositoriesFromJson($json)
    {
        $data = json_decode($json, true);

        $repositories = [];

        foreach ($data['values'] as $repositoryData) {
            $repositories[] = self::createFromArray($repositoryData);
        }

        return $repositories;
    }

    /**
     * @param array $data
     *
     * @return Repository
     */
    public static function createFromArray(array $data)
    {
        $repository = new Repository();
        $hydrator = new RepositoryHydrator();

        return $hydrator->hydrate($repository, $data);
    }
}