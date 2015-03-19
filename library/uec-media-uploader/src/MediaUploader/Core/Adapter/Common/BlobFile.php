<?php

namespace UEC\MediaUploader\Core\Adapter\Common;

use UEC\MediaUploader\Core\Adapter\AbstractAdapter;

class BlobFile extends AbstractAdapter implements BlobFileInterface
{
    private $blob;

    function __construct($blob)
    {
        parent::__construct(null);
        $this->blob = $blob;
    }

    public function getBlob()
    {
        return $this->blob;
    }

    public function getName()
    {
        return;
    }

    public function getSize()
    {
        return strlen($this->blob);
    }

    public function hasError()
    {
        return false;
    }

    public function getError()
    {
        return;
    }

    public function isLocal()
    {
        return true;
    }
}