<?php

namespace UEC\MediaUploader\Core\Uploader\Adapter;

use UEC\MediaUploader\Core\Uploader\AbstractUploadAdapter;

class LocalFile extends AbstractUploadAdapter implements LocalFileInterface
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