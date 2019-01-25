<?php
namespace AtlassianApiClient\Jira\Project\Factory;

use AtlassianApiClient\Jira\Project\Hydrator\ProjectVersionHydrator;
use AtlassianApiClient\Jira\Project\ProjectVersion;
use AtlassianApiClient\Jira\Project\Project;

/**
 * Class ProjectVersionFactory
 * @package AtlassianApiClient\Jira\Project\Factory
 */
class ProjectVersionFactory
{
    /**
     * @param Project $parentProject
     * @param array $data
     * @return ProjectVersion
     */
    public static function createFromArray(Project $parentProject, array $data): ProjectVersion
    {
        $version = new ProjectVersion();
        $hydrator = New ProjectVersionHydrator();

        $version->setProject($parentProject);
        return $hydrator->hydrate($version, $data);
    }

    /**
     * @param Project $parentProject
     * @param array $listOfData
     * @return ProjectVersion[]
     */
    public static function createFromList(Project $parentProject, array $listOfData): array
    {
        $versions = [];

        foreach ($listOfData as $data) {
            $version = static::createFromArray($parentProject, $data);
            $versions[$version->getName()] = $version;
        }

        return $versions;
    }
}
