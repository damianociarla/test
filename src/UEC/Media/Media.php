<?php

namespace UEC\Media;

class Media
{

    protected $path;
    protected $adapter;

    public function __construct($path, $adapter)
    {
        $this->path = $path;
        $this->adapter = $adapter;
    }
}
