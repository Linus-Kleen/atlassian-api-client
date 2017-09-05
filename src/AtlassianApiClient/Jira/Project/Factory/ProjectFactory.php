<?php

namespace AtlassianApiClient\Jira\Project\Factory;

use AtlassianApiClient\Jira\Project\Hydrator\ProjectHydrator;
use AtlassianApiClient\Jira\Project\Project;

/**
 * Class ProjectFactory
 * @package AtlassianApiClient\Jira\Project\Factory
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

        foreach ($data as $projectData) {
            $projects[] = self::createFromArray($projectData);
        }

        return $projects;
    }

    public static function createFromArray(array $data)
    {
        $project = new Project();
        $hydrator = new ProjectHydrator();

        return $hydrator->hydrate($project, $data);
    }
}