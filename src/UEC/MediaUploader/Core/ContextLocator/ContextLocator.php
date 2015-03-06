<?php

namespace UEC\MediaUploader\Core\ContextLocator;

use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Core\Configuration\TypeConfigurationInterface;

class ContextLocator implements ContextLocatorInterface
{
    /**
     * Associative array where the key is the name of the context and the value is an instance of TypeConfigurationInterface
     *
     * @var array
     */
    protected $contexts;

    function __construct(array $contexts)
    {
        $this->contexts = $contexts;
    }

    public function set($context, TypeConfigurationInterface $typeConfiguration)
    {
        $this->contexts[$context] = $typeConfiguration;
        return $this;
    }

    public function has($context)
    {
        return array_key_exists($context, $this->contexts);
    }

    public function get($context)
    {
        if (!is_scalar($context) && !is_string($context)) {
            throw new \UnexpectedValueException('The value must be a string');
        }

        if (!$this->has($context)) {
            throw new \OutOfBoundsException(sprintf('The context "%s" is not present in the configuration', $context));
        }

        return $this->contexts[$context];
    }
}