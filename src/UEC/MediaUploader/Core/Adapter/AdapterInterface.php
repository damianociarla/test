<?php

namespace UEC\MediaUploader\Core\Adapter;

use UEC\MediaUploader\Core\Adapter\Validator\AdapterValidatorInterface;

interface AdapterInterface
{
    /**
     * Get path
     *
     * @return mixed
     */
    public function getPath();

    /**
     * Set path
     *
     * @param mixed $path
     */
    public function setPath($path);

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
     * Check if adapter is for physical file
     *
     * @return bool
     */
    public function isLocal();

    /**
     * Add adapter validator
     *
     * @param AdapterValidatorInterface $validator
     * @param bool $atBeginning
     * @return AdapterInterface
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