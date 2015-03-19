<?php

namespace UEC\Media\Source;

abstract class AbstractSource implements SourceInterface
{
    protected $source;

    function __construct($source)
    {
        $this->source = $source;
    }

    public function getSource()
    {
        return $this->source;
    }
}