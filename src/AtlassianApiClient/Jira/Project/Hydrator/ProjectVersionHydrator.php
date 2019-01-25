<?php
namespace AtlassianApiClient\Jira\Project\Hydrator;

use AtlassianApiClient\Jira\Project\ProjectVersion;

/**
 * Class ProjectVersionHydrator
 * @package AtlassianApiClient\Jira\Project\Hydrator
 */
class ProjectVersionHydrator
{
    /**
     * @param ProjectVersion $version
     * @param array $data
     * @return ProjectVersion
     */
    public function hydrate(ProjectVersion $version, array $data): ProjectVersion
    {
        return $version->setId((int) $data['id'])
            ->setProjectId((int) $data['projectId'])
            ->setUrl($data['self'])
            ->setName($data['name'])
            ->setArchived($data['archived'])
            ->setReleased($data['released'])
            ->setReleaseDate($data['releaseDate'] ?? null)
            ->setUserReleaseDate($data['userReleaseDate'] ?? null);
    }
}
