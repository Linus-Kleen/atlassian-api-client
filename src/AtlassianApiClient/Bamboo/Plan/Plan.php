<?php

namespace AtlassianApiClient\Bamboo\Plan;

/**
 * Class Plan
 * @package AtlassianApiClient\Bamboo\Plan
 */
class Plan
{
    /**
     * @var string
     */
    private $shortName;

    /**
     * @var string
     */
    private $shortKey;

    /**
     * @var string
     */
    private $type;

    /**
     * @var boolean
     */
    private $enabled;

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