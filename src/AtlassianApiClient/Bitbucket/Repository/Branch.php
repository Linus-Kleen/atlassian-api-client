<?php

namespace AtlassianApiClient\Bitbucket\Repository;

/**
 * Class Branch
 * @package AtlassianApiClient\Bitbucket\Repository
 */
class Branch
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $displayId;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $latestCommit;

    /**
     * @var string
     */
    private $latestChangeset;
    /**
     * @var boolean
     */
    private $isDefault;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDisplayId()
    {
        return $this->displayId;
    }

    /**
     * @param string $displayId
     */
    public function setDisplayId($displayId)
    {
        $this->displayId = $displayId;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getLatestCommit()
    {
        return $this->latestCommit;
    }

    /**
     * @param string $latestCommit
     */
    public function setLatestCommit($latestCommit)
    {
        $this->latestCommit = $latestCommit;
    }

    /**
     * @return string
     */
    public function getLatestChangeset()
    {
        return $this->latestChangeset;
    }

    /**
     * @param string $latestChangeset
     */
    public function setLatestChangeset($latestChangeset)
    {
        $this->latestChangeset = $latestChangeset;
    }

    /**
     * @return bool
     */
    public function isDefault()
    {
        return $this->isDefault;
    }

    /**
     * @param bool $isDefault
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;
    }
}