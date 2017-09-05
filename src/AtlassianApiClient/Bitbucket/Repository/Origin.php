<?php

namespace AtlassianApiClient\Bitbucket\Repository;

/**
 * Class Origin
 * @package AtlassianApiClient\Bitbucket\Repository
 */
class Origin
{
    /**
     * @var string
     */
    private $slug;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $scmId;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $statusMessage;

    /**
     * @var boolean
     */
    private $forkable;

    /**
     * @var Project
     */
    private $project;

    /**
     * @var boolean
     */
    private $public;

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getScmId()
    {
        return $this->scmId;
    }

    /**
     * @param string $scmId
     */
    public function setScmId($scmId)
    {
        $this->scmId = $scmId;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getStatusMessage()
    {
        return $this->statusMessage;
    }

    /**
     * @param string $statusMessage
     */
    public function setStatusMessage($statusMessage)
    {
        $this->statusMessage = $statusMessage;
    }

    /**
     * @return bool
     */
    public function isForkable()
    {
        return $this->forkable;
    }

    /**
     * @param bool $forkable
     */
    public function setForkable($forkable)
    {
        $this->forkable = $forkable;
    }

    /**
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Project $project
     */
    public function setProject($project)
    {
        $this->project = $project;
    }

    /**
     * @return bool
     */
    public function isPublic()
    {
        return $this->public;
    }

    /**
     * @param bool $public
     */
    public function setPublic($public)
    {
        $this->public = $public;
    }
}