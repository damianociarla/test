<?php

namespace UEC\Media\Reader;

abstract class AbstractReader implements ReaderInterface
{
    protected $uri;

    function __construct($uri)
    {
        $this->uri = $uri;
    }

    public function getUri()
    {
        return $this->uri;
    }
}