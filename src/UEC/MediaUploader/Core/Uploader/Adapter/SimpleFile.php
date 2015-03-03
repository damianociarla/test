<?php

namespace UEC\MediaUploader\Core\Uploader\Adapter;

use UEC\MediaUploader\Core\CDN\CDNInterface;
use UEC\MediaUploader\Core\Uploader\AbstractUploadAdapter;

class SimpleFile extends AbstractUploadAdapter implements SimpleFileInterface
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

    public function isPhysical()
    {
        return true;
    }

    public function upload(CDNInterface $cdn, $finalPath)
    {
        $cdn->put($finalPath, file_get_contents($this->path));
    }
}