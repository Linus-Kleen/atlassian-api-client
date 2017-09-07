<?php

namespace AtlassianApiClient\Bamboo\Plan\Hydrator;

use AtlassianApiClient\Bamboo\Plan\Plan;

/**
 * Class PlanHydrator
 * @package AtlassianApiClient\Bamboo\Plan\Hydrator
 */
class PlanHydrator
{
    public function hydrate(Plan $plan, array $data)
    {
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'shortName':
                    $plan->setShortName($value);
                    break;
                case 'shortKey':
                    $plan->setShortKey($value);
                    break;
                case 'type':
                    $plan->setType($value);
                    break;
                case 'enabled':
                    $plan->setEnabled($value);
                    break;
                case 'key':
                    $plan->setKey($value);
                    break;
                case 'name':
                    $plan->setName($value);
                    break;
            }
        }

        return $plan;
    }
}