<?php

namespace AtlassianApiClient\Bitbucket\Repository\Hydrator;

use AtlassianApiClient\Bitbucket\Repository\Factory\ProjectFactory;
use AtlassianApiClient\Bitbucket\Repository\Origin;

/**
 * Class OriginHydrator
 * @package AtlassianApiClient\Bitbucket\Repository\Hydrator
 */
class OriginHydrator
{
    /**
     * @param Origin $origin
     * @param array $data
     *
     * @return Origin
     */
    public function hydrate(Origin $origin, array $data)
    {
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'slug':
                    $origin->setSlug($value);
                    break;
                case 'id':
                    $origin->setId($value);
                    break;
                case 'name':
                    $origin->setName($value);
                    break;
                case 'scmId':
                    $origin->setScmId($value);
                    break;
                case 'state':
                    $origin->setState($value);
                    break;
                case 'statusMessage':
                    $origin->setStatusMessage($value);
                    break;
                case 'forkable':
                    $origin->setForkable($value);
                    break;
                case 'project':
                    $origin->setProject(
                        ProjectFactory::createFromArray(
                            $value
                        )
                    );
                    break;
                case 'public':
                    $origin->setPublic($value);
                    break;
            }
        }

        return $origin;
    }
}