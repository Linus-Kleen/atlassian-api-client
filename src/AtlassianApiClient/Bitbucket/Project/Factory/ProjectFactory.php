<?php

namespace AtlassianApiClient\Bitbucket\Project\Factory;

use AtlassianApiClient\Bitbucket\Project\Hydrator\ProjectHydrator;
use AtlassianApiClient\Bitbucket\Project\Project;

/**
 * Class ProjectFactory
 * @package AtlassianApiClient\Bitbucket\Project\Factory
 */
class ProjectFactory
{
    /**
     * @param string $json
     *
     * @return Project[]
     */
    public static function createProjectsFromJson($json)
    {
        $data = json_decode($json, true);

        $projects = [];

        foreach ($data['values'] as $projectData) {
            $projects[] = self::createFromArray($projectData);
        }

        return $projects;
    }

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