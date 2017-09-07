<?php

namespace AtlassianApiClient\Bamboo\Project\Factory;

use AtlassianApiClient\Bamboo\Project\Hydrator\ProjectHydrator;
use AtlassianApiClient\Bamboo\Project\Project;

/**
 * Class ProjectFactory
 * @package AtlassianApiClient\Bamboo\Project\Factory
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