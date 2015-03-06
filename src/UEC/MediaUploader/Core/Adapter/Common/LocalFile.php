<?php

namespace UEC\MediaUploader\Core\Adapter\Common;

use UEC\MediaUploader\Core\Adapter\AbstractAdapter;

class LocalFile extends AbstractAdapter implements LocalFileInterface
{
    private $error;
    private $removeOriginal;

    function __construct($path = null, $removeOriginal = false)
    {
        parent::__construct($path);
        $this->setRemoveOriginal($removeOriginal);
    }

    public function getRemoveOriginal()
    {
        return $this->removeOriginal;
    }

    public function setRemoveOriginal($removeOriginal)
    {
        $this->removeOriginal = (bool)$removeOriginal;
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