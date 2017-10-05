<?php

namespace AtlassianApiClient\Bamboo\Plan;

/**
 * Class Branch
 * @package AtlassianApiClient\Bamboo\Plan
 */
class Branch
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $shortName;

    /**
     * @var string
     */
    private $shortKey;

    /**
     * @var boolean
     */
    private $enabled;

    /**
     * @var string
     */
    private $workflowType;

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * @param string $shortName
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
    }

    /**
     * @return string
     */
    public function getShortKey()
    {
        return $this->shortKey;
    }

    /**
     * @param string $shortKey
     */
    public function setShortKey($shortKey)
    {
        $this->shortKey = $shortKey;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return string
     */
    public function getWorkflowType()
    {
        return $this->workflowType;
    }

    /**
     * @param string $workflowType
     */
    public function setWorkflowType($workflowType)
    {
        $this->workflowType = $workflowType;
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
}