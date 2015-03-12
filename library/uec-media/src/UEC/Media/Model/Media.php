<?php

namespace UEC\Media\Model;

class Media implements MediaInterface
{
    /**
     * Referrer uri
     *
     * @var string
     */
    protected $uri;

    public function getUri()
    {
        return $this->uri;
    }

    public function setUri($uri)
    {
        $this->uri = $uri;
        return $this;
    }
}