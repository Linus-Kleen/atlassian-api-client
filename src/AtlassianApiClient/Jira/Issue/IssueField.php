<?php

namespace AtlassianApiClient\Jira\Issue;

class IssueField
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var mixed
     */
    private $value;

    /**
     * @var bool
     */
    private $changed = false;

    /**
     * IssueField constructor.
     * @param string $key
     * @param mixed $value
     */
    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * @param mixed $value
     */
    public function changeValue($value)
    {
        $this->value = $value;
        $this->changed = true;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function hasChanged()
    {
        return $this->changed;
    }
}