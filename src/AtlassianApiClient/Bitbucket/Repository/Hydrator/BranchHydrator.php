<?php

namespace AtlassianApiClient\Bitbucket\Repository\Hydrator;

use AtlassianApiClient\Bitbucket\Repository\Branch;

/**
 * Class BranchHydrator
 * @package AtlassianApiClient\Bitbucket\Repository\Hydrator
 */
class BranchHydrator
{
    /**
     * @param Branch $branch
     * @param array $data
     *
     * @return Branch
     */
    public function hydrate(Branch $branch, array $data)
    {
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'id':
                    $branch->setId($value);
                    break;
                case 'displayId':
                    $branch->setDisplayId($value);
                    break;
                case 'type':
                    $branch->setType($value);
                    break;
                case 'latestCommit':
                    $branch->setLatestCommit($value);
                    break;
                case 'latestChangeset':
                    $branch->setLatestChangeset($value);
                    break;
                case 'isDefault':
                    $branch->setIsDefault($value);
                    break;
            }
        }

        return $branch;
    }
}