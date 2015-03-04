<?php

namespace UEC\MediaUploader\Core\Adapter\Validator;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;

interface AdapterValidatorInterface
{
    /**
     * Check if validator is support from adapter
     *
     * @param AdapterInterface $adapter
     * @return bool
     */
    public function supports(AdapterInterface $adapter);

    /**
     * Validate an adapter
     *
     * @param AdapterInterface $adapter
     * @return bool
     */
    public function validate(AdapterInterface $adapter);
}