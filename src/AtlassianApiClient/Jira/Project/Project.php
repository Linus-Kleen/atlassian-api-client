<?php

namespace AtlassianApiClient\Jira\Project;

/**
 * Class Project
 * @package AtlassianApiClient\Jira\Project
 */
class Project
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $avatarUrls = [];

    /**
     * @var string
     */
    private $projectTypeKey;

    /**
     * @var ProjectCategory
     */
    private $projectCategory;

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
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
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
     * @return array
     */
    public function getAvatarUrls()
    {
        return $this->avatarUrls;
    }

    /**
     * @param array $avatarUrls
     */
    public function setAvatarUrls($avatarUrls)
    {
        $this->avatarUrls = $avatarUrls;
    }

    /**
     * @return string
     */
    public function getProjectTypeKey()
    {
        return $this->projectTypeKey;
    }

    /**
     * @param string $projectTypeKey
     */
    public function setProjectTypeKey($projectTypeKey)
    {
        $this->projectTypeKey = $projectTypeKey;
    }

    /**
     * @return ProjectCategory
     */
    public function getProjectCategory()
    {
        return $this->projectCategory;
    }

    /**
     * @param ProjectCategory $projectCategory
     */
    public function setProjectCategory($projectCategory)
    {
        $this->projectCategory = $projectCategory;
    }
}