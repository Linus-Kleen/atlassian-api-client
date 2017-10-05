<?php

namespace AtlassianApiClient\Bamboo\Plan\Hydrator;

use AtlassianApiClient\Bamboo\Plan\Branch;

/**
 * Class BranchHydrator
 * @package AtlassianApiClient\Bamboo\Plan\Hydrator
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
                case 'shortName':
                    $branch->setShortName($value);
                    break;
                case 'shortKey':
                    $branch->setShortKey($value);
                    break;
                case 'workflowType':
                    $branch->setWorkflowType($value);
                    break;
                case 'enabled':
                    $branch->setEnabled($value);
                    break;
                case 'key':
                    $branch->setKey($value);
                    break;
                case 'name':
                    $branch->setName($value);
                    break;
                case 'description':
                    $branch->setDescription($value);
                    break;
            }
        }

        return $branch;
    }
}