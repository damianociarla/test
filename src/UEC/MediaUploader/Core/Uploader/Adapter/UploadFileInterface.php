<?php

namespace UEC\MediaUploader\Core\Uploader\Adapter;

use UEC\MediaUploader\Core\Uploader\UploadAdapterInterface;

interface UploadFileInterface extends UploadAdapterInterface
{
    /**
     * Get file
     *
     * @return array
     */
    public function getFile();
}