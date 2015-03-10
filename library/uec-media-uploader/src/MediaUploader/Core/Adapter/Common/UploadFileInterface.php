<?php

namespace UEC\MediaUploader\Core\Adapter\Common;

use UEC\MediaUploader\Core\Adapter\AdapterStreamInterface;

interface UploadFileInterface extends AdapterStreamInterface
{
    /**
     * Get file
     *
     * @return array
     */
    public function getFile();
}