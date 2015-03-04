<?php

namespace UEC\MediaUploader\Core\Uploader\Adapter;

use UEC\MediaUploader\Core\Uploader\UploadAdapterStreamInterface;

interface UploadFileInterface extends UploadAdapterStreamInterface
{
    /**
     * Get file
     *
     * @return array
     */
    public function getFile();
}