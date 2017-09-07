<?php

namespace AtlassianApiClient\Jira\Issue\Factory;

use AtlassianApiClient\Jira\Issue\Hydrator\IssueHydrator;
use AtlassianApiClient\Jira\Issue\Issue;

/**
 * Class IssueFactory
 * @package AtlassianApiClient\Jira\Issue\Factory
 */
class IssueFactory
{
    /**
     * @param array $data
     *
     * @return Issue
     */
    public static function createFromArray(array $data)
    {
        $issue = new Issue();
        $hydrator = new IssueHydrator();

        return $hydrator->hydrate($issue, $data);
    }
}