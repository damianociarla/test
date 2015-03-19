<?php

namespace UEC\Media\Adapter;

abstract class AbstractAdapter implements AdapterInterface
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