<?php

namespace AtlassianApiClient\Jira\Issue\Hydrator;

use AtlassianApiClient\Jira\Issue\Issue;

/**
 * Class IssueHydrator
 * @package AtlassianApiClient\Jira\Issue\Hydrator
 */
class IssueHydrator
{
    /**
     * @param Issue $issue
     * @param array $data
     *
     * @return Issue
     */
    public function hydrate(Issue $issue, array $data)
    {
        foreach ($data  as $key => $value) {
            switch ($key) {
                case 'id':
                    $issue->setId((int) $value);
                    break;
                case 'key':
                    $issue->setKey($value);
                    break;
                case 'fields':
                    $issue->setSummary($value['summary']);
                    foreach ($value as $fieldName => $fieldData) {
                        $issue->setField($fieldName, $fieldData);
                    }
                    break;
                case 'summary':
                    $issue->setSummary($value);
                    break;
            }
        }

        $issue->setResponseData($data);
        return $issue;
    }
}
