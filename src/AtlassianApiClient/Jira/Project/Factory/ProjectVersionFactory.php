<?php
namespace AtlassianApiClient\Jira\Project\Factory;

use AtlassianApiClient\Jira\Project\Hydrator\ProjectVersionHydrator;
use AtlassianApiClient\Jira\Project\ProjectVersion;

/**
 * Class ProjectVersionFactory
 * @package AtlassianApiClient\Jira\Project\Factory
 */
class ProjectVersionFactory
{
    /**
     * @param array $data
     * @return ProjectVersion
     */
    public static function createFromArray(array $data): ProjectVersion
    {
        $version = new ProjectVersion();
        $hydrator = New ProjectVersionHydrator();

        return $hydrator->hydrate($version, $data);
    }

    /**
     * @param array $listOfData
     * @return ProjectVersion[]
     */
    public static function createFromList(array $listOfData): array
    {
        $versions = [];

        foreach ($listOfData as $data) {
            $version = static::createFromArray($data);
            $versions[$version->getName()] = $version;
        }

        return $versions;
    }
}
