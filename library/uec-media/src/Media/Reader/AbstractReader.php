<?php

namespace UEC\Media\Reader;

abstract class AbstractReader
{
    protected $uri;
    protected $error;

    public function __construct($uri)
    {
        $this->uri = $uri;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function getError()
    {
        return $this->error;
    }
}
