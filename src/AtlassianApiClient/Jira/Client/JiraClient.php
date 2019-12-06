<?php

namespace AtlassianApiClient\Jira\Client;

use AtlassianApiClient\Jira\Issue\Factory\IssueFactory;
use AtlassianApiClient\Jira\Issue\Issue;
use AtlassianApiClient\Jira\Project\Factory\ProjectFactory;
use AtlassianApiClient\Jira\Project\Factory\ProjectVersionFactory;
use AtlassianApiClient\Jira\Project\Project;
use AtlassianApiClient\Jira\Project\ProjectVersion;
use Exception;
use GuzzleHttp\Client;
use function array_key_exists;
use function json_decode;
use function sprintf;
use function urlencode;

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
     * @var int
     */
    protected $resultsLimit = 100;

    /**
     * JiraClient constructor.
     * @param Client $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return int
     */
    public function getResultsLimit(): int
    {
        return $this->resultsLimit;
    }

    /**
     * @param int $resultsLimit
     * @return JiraClient
     */
    public function setResultsLimit(int $resultsLimit): JiraClient
    {
        $this->resultsLimit = $resultsLimit;
        return $this;
    }

    /**
     * @return Project[]
     */
    public function getProjects(): array
    {
        $response = $this->httpClient->get(
            '/rest/api/2/project?limit=' . $this->getResultsLimit()
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

        $data = json_decode($response->getContents(), true);
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

        $data = json_decode($response->getContents(), true);
        return ProjectVersionFactory::createFromList($project, $data);
    }

    /**
     * @param string $issueKey
     * @return Issue
     */
    public function getIssueByKey($issueKey)
    {
        try {
            $response = $this->httpClient->get(
                '/rest/api/2/issue/' . $issueKey
            )->getBody()->getContents();

            return IssueFactory::createFromArray(json_decode($response, true));
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * @param string $query
     * @return Issue[]
     */
    public function getIssuesFromJql(string $query): array
    {
        $jql = urlencode($query);

        $response = $this->httpClient->get(
            "/rest/api/2/search?jql=$jql&maxResults=" . $this->getResultsLimit()
        )->getBody();

        $searchResult = json_decode($response->getContents(), true);
        $issues = [];

        if (array_key_exists('issues', $searchResult)) {
            foreach ($searchResult['issues'] as $issueData) {
                $issues[] = IssueFactory::createFromArray($issueData);
            }
        }

        return $issues;
    }

    /**
     * @param ProjectVersion $version
     * @return Issue[]
     */
    public function getIssuesFromVersion(ProjectVersion $version): array
    {
        return $this->getIssuesFromJql(sprintf('project = %s AND fixVersion = "%s"',
            $version->getProject()->getKey(), $version->getName()));
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
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }
}
