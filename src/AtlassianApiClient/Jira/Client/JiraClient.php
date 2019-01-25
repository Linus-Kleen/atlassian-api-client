<?php

namespace AtlassianApiClient\Jira\Client;

use AtlassianApiClient\Jira\Issue\Factory\IssueFactory;
use AtlassianApiClient\Jira\Issue\Issue;
use AtlassianApiClient\Jira\Project\Factory\ProjectFactory;
use AtlassianApiClient\Jira\Project\Factory\ProjectVersionFactory;
use AtlassianApiClient\Jira\Project\Project;
use AtlassianApiClient\Jira\Project\ProjectVersion;
use GuzzleHttp\Client;

/**
 * Class JiraClient
 * @package AtlassianApiClient\Jira\Client
 */
class JiraClient
{
    /**
     * @var Client
     */
    private $httpClient;

    /**
     * JiraClient constructor.
     * @param Client $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return Project[]
     */
    public function getProjects(): array
    {
        $response = $this->httpClient->get(
            '/rest/api/2/project?limit=1000'
        )->getBody();

        return ProjectFactory::createProjectsFromJson($response->getContents());
    }

    /**
     * @param $projectKey
     * @return Project
     */
    public function getProjectByKey($projectKey): Project
    {
        $response = $this->httpClient->get(
            "/rest/api/2/project/$projectKey"
        )->getBody();

        $data = \json_decode($response->getContents(), true);
        return ProjectFactory::createFromArray($data);
    }

    /**
     * @param Project $project
     * @return array
     */
    public function getProjectVersions(Project $project): array
    {
        $projectKey = $project->getKey();
        $response = $this->httpClient->get(
            "/rest/api/2/project/$projectKey/versions"
        )->getBody();

        $data = \json_decode($response->getContents(), true);
        return ProjectVersionFactory::createFromList($project, $data);
    }

    /**
     * @param string $issueKey
     * @return \AtlassianApiClient\Jira\Issue\Issue
     */
    public function getIssueByKey($issueKey)
    {
        try {
            $response = $this->httpClient->get(
                '/rest/api/2/issue/' . $issueKey
            )->getBody()->getContents();

            return IssueFactory::createFromArray(json_decode($response, true));
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * @param ProjectVersion $version
     * @return Issue[]
     */
    public function getIssuesFromVersion(ProjectVersion $version): array
    {
        $projectId = $version->getProjectId();
        $jql = \urlencode(\sprintf('project = %s AND fixVersion = "%s"',
            $version->getProject()->getKey(), $version->getName()));

        $response = $this->httpClient->get(
            "/rest/api/2/issue/picker?query=FL-&currentJQL=$jql&currentProjectId=$projectId"
        )->getBody();
        $searchResult = \json_decode($response->getContents(), true);

        if (\array_key_exists('sections', $searchResult)) {
            foreach ($searchResult['sections'] as $section) {
                if ('cs' === $section['id']) {
                    return \array_map(function($data) {
                        return IssueFactory::createFromArray($data);
                    }, $section['issues']);
                }
            }
        }

        return [];
    }

    public function updateIssue(Issue $issue)
    {
        try {
            $this->httpClient->put(
                '/rest/api/2/issue/' . $issue->getKey(),
                [
                    'json' => $issue->getChanges(),
                ]
            );
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
}
