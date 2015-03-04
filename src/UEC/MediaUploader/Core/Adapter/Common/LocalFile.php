<?php

namespace UEC\MediaUploader\Core\Adapter\Common;

use UEC\MediaUploader\Core\Adapter\AbstractAdapter;

class LocalFile extends AbstractAdapter implements LocalFileInterface
{
    private $path;
    private $error;

    function __construct($path)
    {
        $this->path = $path;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getName()
    {
        return pathinfo($this->path, PATHINFO_BASENAME);
    }

    public function getSize()
    {
        return filesize($this->path);
    }

    public function hasError()
    {
        if (!file_exists($this->path)) {
            $this->error = sprintf('File "%s" not found', $this->path);
            return true;
        }

        return false;
    }

    public function getError()
    {
        return $this->error;
    }

    public function isLocal()
    {
        return true;
    }
}