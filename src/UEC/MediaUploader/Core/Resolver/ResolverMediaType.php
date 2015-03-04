<?php

namespace UEC\MediaUploader\Core\Resolver;

use UEC\MediaUploader\Core\Factory\ContextConfigurationFactoryInterface;
use UEC\MediaUploader\Core\Model\MediaInterface;

class ResolverMediaType implements ResolverMediaTypeInterface
{
    protected $contextConfigurationFactory;

    function __construct(ContextConfigurationFactoryInterface $contextConfigurationFactory)
    {
        $this->contextConfigurationFactory = $contextConfigurationFactory;
    }

    public function resolve(MediaInterface $media)
    {
        $mediaTypeManager = $this->contextConfigurationFactory->get($media);
        return $mediaTypeManager->getMediaTypeManager()->findByMedia($media);
    }
}