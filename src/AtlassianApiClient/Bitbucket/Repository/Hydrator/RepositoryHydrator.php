<?php

namespace AtlassianApiClient\Bitbucket\Repository\Hydrator;

use AtlassianApiClient\Bitbucket\Repository\Factory\OriginFactory;
use AtlassianApiClient\Bitbucket\Repository\Factory\ProjectFactory;
use AtlassianApiClient\Bitbucket\Repository\Repository;

/**
 * Class RepositoryHydrator
 * @package AtlassianApiClient\Bitbucket\Repository\Hydrator
 */
class RepositoryHydrator
{
    /**
     * @param Repository $repository
     * @param array $data
     *
     * @return Repository
     */
    public function hydrate(Repository $repository, array $data)
    {
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'slug':
                    $repository->setSlug($value);
                    break;
                case 'id':
                    $repository->setId($value);
                    break;
                case 'name':
                    $repository->setName($value);
                    break;
                case 'scmId':
                    $repository->setScmId($value);
                    break;
                case 'state':
                    $repository->setState($value);
                    break;
                case 'statusMessage':
                    $repository->setStatusMessage($value);
                    break;
                case 'forkable':
                    $repository->setForkable($value);
                    break;
                case 'origin':
                    $repository->setOrigin(
                        OriginFactory::createFromArray($value)
                    );
                    break;
                case 'project':
                    $repository->setProject(
                        ProjectFactory::createFromArray($value)
                    );
                    break;
                case 'public':
                    $repository->setPublic($value);
                    break;
            }
        }

        return $repository;
    }
}