<?php

namespace UEC\MediaUploader\Core\Resolver;

use UEC\MediaUploader\Core\Factory\ContextConfigurationInterface;
use UEC\MediaUploader\Core\Model\MediaInterface;

class ResolverMediaType implements ResolverMediaTypeInterface
{
    protected $contextConfigurationFactory;

    function __construct(ContextConfigurationInterface $contextConfiguration)
    {
        $this->contextConfiguration = $contextConfiguration;
    }

    public function resolve(MediaInterface $media)
    {
        $mediaTypeManager = $this->contextConfiguration->get($media);
        return $mediaTypeManager->getMediaTypeManager()->findByMedia($media);
    }
}