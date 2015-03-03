<?php

namespace UEC\MediaUploader\Core\Uploader;

use UEC\MediaUploader\Core\CDN\CDNInterface;

interface UploadAdapterInterface
{
    /**
     * Get path
     *
     * @return mixed
     */
    public function getPath();

    /**
     * Get name of the file
     *
     * @return string
     */
    public function getName();

    /**
     * Get size of the file
     *
     * @return int
     */
    public function getSize();

    /**
     * Check if the file has an error
     *
     * @return bool
     */
    public function hasError();

    /**
     * Get error
     *
     * @return string
     */
    public function getError();

    /**
     * Upload logic
     *
     * @param CDNInterface $cdn
     * @param string $finalPath
     */
    public function upload(CDNInterface $cdn, $finalPath);

    /**
     * Check if adapter is for physical file
     *
     * @return bool
     */
    public function isPhysical();

    /**
     * Add adapter validator
     *
     * @param AdapterValidatorInterface $validator
     * @param bool $atBeginning
     * @return UploadAdapterInterface
     */
    public function addValidator(AdapterValidatorInterface $validator, $atBeginning = false);

    /**
     * Get validators
     *
     * @return array
     */
    public function getValidators();

    /**
     * Check each validator
     *
     * @return bool
     */
    public function isValid();
}