<?php

namespace AtlassianApiClient\Jira\Issue;

/**
 * Class Issue
 * @package AtlassianApiClient\Jira\Issue
 */
class Issue
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
    private $summary;

    /**
     * @var IssueField[]
     */
    private $fields = [];

    /**
     * @var array
     */
    private $responseData;

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
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param array $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function getField($name)
    {
        if (array_key_exists($name, $this->fields)) {
            return $this->fields[$name];
        }

        return null;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function setField($name, $value)
    {
        if (array_key_exists($name, $this->fields)) {
            $this->fields[$name]->changeValue($value);
        } else {
            $this->fields[$name] = new IssueField($name, $value);
        }
    }

    /**
     * @return array
     */
    public function getChanges()
    {
        $changedFields = [
            'fields' => [],
        ];

        foreach ($this->fields as $name => $field) {
            if ($field->hasChanged()) {
                $changedFields['fields'][$name] = $field->getValue();
            }
        }

        return $changedFields;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     */
    public function setSummary(string $summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return array
     */
    public function getResponseData(): array
    {
        return $this->responseData;
    }

    /**
     * @param array $responseData
     */
    public function setResponseData(array $responseData)
    {
        $this->responseData = $responseData;
    }
}
