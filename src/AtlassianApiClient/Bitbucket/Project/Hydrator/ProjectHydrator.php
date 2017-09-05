<?php

namespace AtlassianApiClient\Bitbucket\Project\Hydrator;

use AtlassianApiClient\Bitbucket\Project\Project;

/**
 * Class ProjectHydrator
 * @package AtlassianApiClient\Bitbucket\Project\Hydrator
 */
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
                case 'key':
                    $project->setKey($value);
                    break;
                case 'id':
                    $project->setId($value);
                    break;
                case 'name':
                    $project->setName($value);
                    break;
                case 'description':
                    $project->setDescription($value);
                    break;
                case 'public':
                    $project->setPublic($value);
                    break;
                case 'type':
                    $project->setType($value);
                    break;
            }
        }

        return $project;
    }
}