<?php

namespace UEC\Media;

class Uri implements UriInterface
{
    protected $value;

    function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function isValid()
    {
        return true;
    }

    function __toString()
    {
        return $this->value;
    }
}