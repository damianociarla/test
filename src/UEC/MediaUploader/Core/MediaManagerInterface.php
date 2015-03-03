<?php

namespace UEC\MediaUploader\Core;

use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Core\Uploader\CommonFileInterface;
use UEC\MediaUploader\Core\Uploader\UploadAdapterInterface;

interface MediaManagerInterface
{
    /**
     * @param string $context
     * @param UploadAdapterInterface $adapter
     * @return MediaInterface
     */
    public function save($context, UploadAdapterInterface $adapter);
}