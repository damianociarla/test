<?php

namespace UEC\MediaUploader\Core\Factory;

use UEC\MediaUploader\Core\Configuration\TypeConfigurationInterface;
use UEC\MediaUploader\Core\Model\MediaInterface;

interface ContextConfigurationInterface
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