<?php

namespace AtlassianApiClient\Jira\Project\Hydrator;

use AtlassianApiClient\Jira\Project\ProjectCategory;

/**
 * Class ProjectCategoryHydrator
 * @package AtlassianApiClient\Jira\Project\Hydrator
 */
class ProjectCategoryHydrator
{
    /**
     * @param ProjectCategory $category
     * @param array $data
     *
     * @return ProjectCategory
     */
    public function hydrate(ProjectCategory $category, array $data)
    {
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'id':
                    $category->setId($value);
                    break;
                case 'name':
                    $category->setName($value);
                    break;
                case 'description':
                    $category->setDescription($value);
                    break;
            }
        }

        return $category;
    }
}