<?php

namespace UEC\Media\Adapter;

abstract class AbstractAdapter implements AdapterInterface
{
    protected $source;

    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    public function getSource()
    {
        return $this->source;
    }
}