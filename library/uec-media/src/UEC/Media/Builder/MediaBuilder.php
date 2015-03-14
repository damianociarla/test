<?php

namespace UEC\Media\Builder;

class MediaBuilder implements MediaBuilderInterface
{
    private $properties;

    public function getProperties()
    {
        return $this->properties;
    }

    public function add($field, $value)
    {
        $this->properties[$field] = $value;

        return $this;
    }
}