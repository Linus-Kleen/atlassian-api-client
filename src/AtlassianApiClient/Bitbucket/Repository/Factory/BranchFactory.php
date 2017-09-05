<?php

namespace AtlassianApiClient\Bitbucket\Repository\Factory;

use AtlassianApiClient\Bitbucket\Repository\Branch;
use AtlassianApiClient\Bitbucket\Repository\Hydrator\BranchHydrator;

/**
 * Class BranchFactory
 * @package AtlassianApiClient\Bitbucket\Repository\Factory
 */
class BranchFactory
{
    /**
     * @param $json
     *
     * @return Branch[]
     */
    public static function createBranchesFromJson($json)
    {
        $data = json_decode($json, true);

        $branches = [];

        foreach ($data['values'] as $branchData) {
            $branches[] = self::createFromArray($branchData);
        }

        return $branches;
    }

    /**
     * @param $branchData
     *
     * @return Branch
     */
    public static function createFromArray($branchData)
    {
        $branch = new Branch();
        $hydrator = new BranchHydrator();

        return $hydrator->hydrate($branch, $branchData);
    }
}