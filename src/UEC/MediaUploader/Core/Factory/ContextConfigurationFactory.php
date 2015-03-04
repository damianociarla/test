<?php

namespace UEC\MediaUploader\Core\Factory;

use UEC\MediaUploader\Core\Model\MediaInterface;

class ContextConfigurationFactory implements ContextConfigurationFactoryInterface
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

    public function get($context)
    {
        if (!is_scalar($context) && !$context instanceof MediaInterface) {
            throw new \UnexpectedValueException('The value must be a string or an instance of MediaInterface');
        }

        if ($context instanceof MediaInterface) {
            $context = $context->getContext();
        }

        if (!array_key_exists($context, $this->contexts)) {
            throw new \OutOfBoundsException(sprintf('The context "%s" is not present in the configuration', $context));
        }

        return $this->contexts[$context];
    }
}