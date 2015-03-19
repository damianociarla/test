<?php

namespace UEC\MediaUploader\Core\ContextLocator;

use UEC\MediaUploader\Core\Configuration\TypeConfigurationInterface;

interface ContextLocatorInterface
{
    /**
     * Get an instance of TypeConfigurationInterface
     *
     * @throws \UnexpectedValueException
     * @throws \OutOfBoundsException
     *
     * @param string $context
     * @return TypeConfigurationInterface
     */
    public function get($context);

    /**
     * Determine if a context exists
     *
     * @param string $context
     * @return bool
     */
    public function has($context);
}