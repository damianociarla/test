<?php

namespace ContextLocator;

use UEC\MediaUploader\Core\Configuration\TypeConfigurationInterface;
use UEC\MediaUploader\Core\ContextLocator\ContextLocatorInterface;
use Zend\ServiceManager;

class Zf2ContextLocator extends ServiceManager\ServiceManager implements ContextLocatorInterface
{
    /**
     * Associative array where the key is the name of the context and the value is an instance of TypeConfigurationInterface
     *
     * @var array
     */
    protected $contexts;

    public function __construct($config)
    {
        if (is_array($config)) {
            $config = new \Zend\ServiceManager\Config($config);
        }

        parent::__construct($config);
    }

    public function set($context, TypeConfigurationInterface $typeConfiguration)
    {
        $this->contexts[$context] = $typeConfiguration;
        return $this;
    }
}