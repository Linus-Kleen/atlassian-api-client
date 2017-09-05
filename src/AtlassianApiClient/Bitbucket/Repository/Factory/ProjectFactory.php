<?php

namespace AtlassianApiClient\Bitbucket\Repository\Factory;

use AtlassianApiClient\Bitbucket\Repository\Hydrator\ProjectHydrator;
use AtlassianApiClient\Bitbucket\Repository\Project;

/**
 * Class ProjectFactory
 * @package AtlassianApiClient\Bitbucket\Repository\Factory
 */
class ProjectFactory
{
    /**
     * @param array $data
     *
     * @return Project
     */
    public static function createFromArray(array $data)
    {
        $project = new Project();
        $hydrator = new ProjectHydrator();

        return $hydrator->hydrate($project, $data);
    }
}