<?php

namespace UEC\MediaUploader\Core\ContextLocator;

use UEC\MediaUploader\Core\Configuration\TypeConfigurationInterface;
use Zend\ServiceManager;

class ContextLocator extends ServiceManager\ServiceManager implements ContextLocatorInterface
{
    /**
     * Associative array where the key is the name of the context and the value is an instance of TypeConfigurationInterface
     *
     * @var array
     */
    protected $contexts;

    public function set($context, TypeConfigurationInterface $typeConfiguration)
    {
        $this->contexts[$context] = $typeConfiguration;
        return $this;
    }
}