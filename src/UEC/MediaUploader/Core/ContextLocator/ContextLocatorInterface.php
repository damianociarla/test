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
     * Set a context resolver
     *
     * @param $context
     * @param TypeConfigurationInterface $typeConfiguration
     * @return $this
     */
    public function set($context, TypeConfigurationInterface $typeConfiguration);

    /**
     * Determine if a context exists
     *
     * @param string $context
     * @return bool
     */
    public function has($context);
}