<?php

namespace UEC\Media\Model;

class Media implements MediaInterface
{
    /**
     * @var string
     */
    protected $source;

    public function getSource()
    {
        return $this->source;
    }

    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }
}