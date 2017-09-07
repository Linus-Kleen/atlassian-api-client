<?php

namespace AtlassianApiClient\Bamboo\Plan\Factory;

use AtlassianApiClient\Bamboo\Plan\Hydrator\PlanHydrator;
use AtlassianApiClient\Bamboo\Plan\Plan;

/**
 * Class PlanFactory
 * @package AtlassianApiClient\Bamboo\Plan\Factory
 */
class PlanFactory
{
    /**
     * @param array $data
     * @return Plan
     */
    public static function createFromArray(array $data)
    {
        $plan = new Plan();
        $hydrator = new PlanHydrator();

        return $hydrator->hydrate($plan, $data);
    }
}