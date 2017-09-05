<?php

namespace AtlassianApiClient\Bitbucket\Repository\Factory;

use AtlassianApiClient\Bitbucket\Repository\Hydrator\OriginHydrator;
use AtlassianApiClient\Bitbucket\Repository\Origin;

/**
 * Class OriginFactory
 * @package AtlassianApiClient\Bitbucket\Repository\Factory
 */
class OriginFactory
{
    /**
     * @param array $data
     *
     * @return Origin
     */
    public static function createFromArray(array $data)
    {
        $origin = new Origin();
        $hydrator = new OriginHydrator();

        return $hydrator->hydrate($origin, $data);
    }
}