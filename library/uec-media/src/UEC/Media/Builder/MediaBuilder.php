<?php

namespace UEC\Media\Builder;

class MediaBuilder implements MediaBuilderInterface
{
    private $className;
    private $properties;

    public function getClassName()
    {
        return $this->className;
    }

    public function setClassName($className)
    {
        $this->className = $className;
        return $this;
    }

    public function getProperties()
    {
        return $this->properties;
    }

    public function add($field, $method, array $params = array())
    {
        $this->properties[$field] = array(
            'method' => $method,
            'params' => $params,
        );

        return $this;
    }
}