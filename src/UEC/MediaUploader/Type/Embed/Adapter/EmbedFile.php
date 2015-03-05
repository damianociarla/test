<?php

namespace UEC\MediaUploader\Type\Embed\Adapter;

use UEC\MediaUploader\Core\Adapter\AbstractAdapter;

class EmbedFile extends AbstractAdapter implements EmbedFileInterface
{
    private $path;

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
        return null;
    }

    public function getSize()
    {
        return null;
    }

    public function hasError()
    {
        return filter_var($this->path, FILTER_VALIDATE_URL);
    }

    public function getError()
    {
        return 'Invalid url';
    }

    public function isLocal()
    {
        return false;
    }
}