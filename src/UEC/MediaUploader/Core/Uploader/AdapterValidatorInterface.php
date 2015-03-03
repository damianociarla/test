<?php

namespace UEC\MediaUploader\Core\Uploader;

interface AdapterValidatorInterface
{
    /**
     * Check if validator is support from adapter
     *
     * @param UploadAdapterInterface $adapter
     * @return bool
     */
    public function supports(UploadAdapterInterface $adapter);

    /**
     * Validate an adapter
     *
     * @param UploadAdapterInterface $adapter
     * @return bool
     */
    public function validate(UploadAdapterInterface $adapter);
}