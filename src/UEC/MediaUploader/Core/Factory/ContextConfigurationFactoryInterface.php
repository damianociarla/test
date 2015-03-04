<?php

namespace UEC\MediaUploader\Core\Factory;

use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Core\Services\ContextConfigurationInterface;

interface ContextConfigurationFactoryInterface
{
    /**
     * Get an instance of ContextConfigurationInterface
     *
     * @throws \UnexpectedValueException
     * @throws \OutOfBoundsException
     *
     * @param MediaInterface|string $context
     * @return ContextConfigurationInterface
     */
    public function get($context);
}