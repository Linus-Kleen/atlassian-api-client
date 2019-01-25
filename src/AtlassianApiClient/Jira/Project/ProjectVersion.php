<?php
namespace AtlassianApiClient\Jira\Project;

/**
 * Class ProjectVersion
 * @package AtlassianApiClient\Jira\Project
 */
class ProjectVersion
{
    /** @var string */
    protected $url;
    /** @var int */
    protected $id;
    /** @var int */
    protected $projectId;
    /** @var string */
    protected $name;
    /** @var bool */
    protected $archived;
    /** @var bool */
    protected $released;
    /** @var string|null */
    protected $releaseDate;
    /** @var string|null */
    protected $userReleaseDate;
    /** @var Project */
    protected $project;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return ProjectVersion
     */
    public function setUrl(string $url): ProjectVersion
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ProjectVersion
     */
    public function setId(int $id): ProjectVersion
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     * @return ProjectVersion
     */
    public function setProjectId(int $projectId): ProjectVersion
    {
        $this->projectId = $projectId;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ProjectVersion
     */
    public function setName(string $name): ProjectVersion
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return bool
     */
    public function isArchived(): bool
    {
        return $this->archived;
    }

    /**
     * @param bool $archived
     * @return ProjectVersion
     */
    public function setArchived(bool $archived): ProjectVersion
    {
        $this->archived = $archived;
        return $this;
    }

    /**
     * @return bool
     */
    public function isReleased(): bool
    {
        return $this->released;
    }

    /**
     * @param bool $released
     * @return ProjectVersion
     */
    public function setReleased(bool $released): ProjectVersion
    {
        $this->released = $released;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @param string|null $releaseDate
     * @return ProjectVersion
     */
    public function setReleaseDate($releaseDate): ProjectVersion
    {
        $this->releaseDate = $releaseDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserReleaseDate()
    {
        return $this->userReleaseDate;
    }

    /**
     * @param string|null $userReleaseDate
     * @return ProjectVersion
     */
    public function setUserReleaseDate($userReleaseDate): ProjectVersion
    {
        $this->userReleaseDate = $userReleaseDate;
        return $this;
    }

    /**
     * @return Project
     */
    public function getProject(): Project
    {
        return $this->project;
    }

    /**
     * @param Project $project
     * @return ProjectVersion
     */
    public function setProject(Project $project): ProjectVersion
    {
        $this->project = $project;
        return $this;
    }
}
