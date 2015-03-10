<?php

namespace UEC\MediaUploader\Core\Resolver;

use UEC\MediaUploader\Core\ContextLocator\ContextLocatorInterface;
use UEC\MediaUploader\Core\Model\MediaInterface;

class MediaTypeResolver implements MediaTypeResolverInterface
{
    protected $contextLocator;

    function __construct(ContextLocatorInterface $contextLocator)
    {
        $this->contextLocator = $contextLocator;
    }

    public function resolve(MediaInterface $media)
    {
        $mediaTypeManager = $this->contextLocator->get($media->getContext());
        return $mediaTypeManager->getMediaTypeManager()->findByMedia($media);
    }
}