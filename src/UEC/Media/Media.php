<?php

namespace UEC\Media;

use UEC\Media\Adapter\AdapterInterface;

class Media implements MediaInterface
{
    protected $path;
    protected $adapterReader;

    public function __construct($path, AdapterInterface $adapterReader)
    {
        $this->path = $path;
        $this->adapterReader = $adapterReader;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getAdapterReader()
    {
        return $this->adapterReader;
    }
}
