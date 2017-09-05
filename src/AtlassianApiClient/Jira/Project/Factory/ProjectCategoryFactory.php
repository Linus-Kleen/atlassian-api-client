<?php

namespace AtlassianApiClient\Jira\Project\Factory;

use AtlassianApiClient\Jira\Project\Hydrator\ProjectCategoryHydrator;
use AtlassianApiClient\Jira\Project\ProjectCategory;

/**
 * Class ProjectCategoryFactory
 * @package AtlassianApiClient\Jira\Project\Factory
 */
class ProjectCategoryFactory
{
    /**
     * @param array $data
     *
     * @return ProjectCategory
     */
    public static function createFromArray(array $data)
    {
        $projectCategory = new ProjectCategory();
        $hydrator = new ProjectCategoryHydrator();

        return $hydrator->hydrate($projectCategory, $data);
    }
}