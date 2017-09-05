<?php

namespace AtlassianApiClient\Jira\Project\Hydrator;

use AtlassianApiClient\Jira\Project\Factory\ProjectCategoryFactory;
use AtlassianApiClient\Jira\Project\Project;

class ProjectHydrator
{
    /**
     * @param Project $project
     * @param array $data
     *
     * @return Project
     */
    public function hydrate(Project $project, array $data)
    {
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'id':
                    $project->setId($value);
                    break;
                case 'key':
                    $project->setKey($value);
                    break;
                case 'name':
                    $project->setName($value);
                    break;
                case 'avatarUrls':
                    $project->setAvatarUrls((array) $value);
                    break;
                case 'projectTypeKey':
                    $project->setProjectTypeKey($value);
                    break;
                case 'projectCategory':
                    $project->setProjectCategory(
                        ProjectCategoryFactory::createFromArray(
                            (array) $value
                        )
                    );
            }
        }

        return $project;
    }
}
