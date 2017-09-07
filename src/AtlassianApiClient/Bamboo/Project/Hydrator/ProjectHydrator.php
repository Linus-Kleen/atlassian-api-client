<?php

namespace AtlassianApiClient\Bamboo\Project\Hydrator;

use AtlassianApiClient\Bamboo\Project\Project;

/**
 * Class ProjectHydrator
 * @package AtlassianApiClient\Bamboo\Project\Hydrator
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
                case 'id':
                    $project->setId($value);
                    break;
                case 'name':
                    $project->setName($value);
                    break;
            }
        }

        return $project;
    }
}