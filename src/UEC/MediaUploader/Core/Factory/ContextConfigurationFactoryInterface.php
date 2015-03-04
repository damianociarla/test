<?php

namespace UEC\MediaUploader\Core\Factory;

use UEC\MediaUploader\Core\Configuration\TypeConfigurationInterface;
use UEC\MediaUploader\Core\Model\MediaInterface;

interface ContextConfigurationFactoryInterface
{
    /**
     * Get an instance of TypeConfigurationInterface
     *
     * @throws \UnexpectedValueException
     * @throws \OutOfBoundsException
     *
     * @param MediaInterface|string $context
     * @return TypeConfigurationInterface
     */
    public function get($context);
}