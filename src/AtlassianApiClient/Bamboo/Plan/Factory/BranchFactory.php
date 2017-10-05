<?php

namespace AtlassianApiClient\Bamboo\Plan\Factory;

use AtlassianApiClient\Bamboo\Plan\Branch;
use AtlassianApiClient\Bamboo\Plan\Hydrator\BranchHydrator;

class BranchFactory
{
    /**
     * @param array $data
     * @return Branch
     */
    public static function createFromArray(array $data)
    {
        $branch = new Branch();
        $hydrator = new BranchHydrator();

        return $hydrator->hydrate($branch, $data);
    }
}