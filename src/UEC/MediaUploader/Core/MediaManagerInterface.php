<?php

namespace UEC\MediaUploader\Core;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;
use UEC\MediaUploader\Core\Configuration\TypeConfigurationInterface;
use UEC\MediaUploader\Core\Model\MediaInterface;

interface MediaManagerInterface
{
    /**
     * @param AdapterInterface $adapter
     * @param string $context
     * @return MediaInterface
     */
    public function save(AdapterInterface $adapter, $context);

    /**
     * Get configuration from context. Context can be a string or an instance of MediaInterface
     *
     * @param MediaInterface|string $context
     * @return TypeConfigurationInterface
     */
    public function getContextLocator($context);
}