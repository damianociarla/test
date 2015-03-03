<?php

namespace UEC\MediaUploader\Core\Listener;

use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Core\Resolver\ResolverMediaTypeInterface;

abstract class MediaTypeInjection
{
    protected $resolverMediaType;

    function __construct(ResolverMediaTypeInterface $resolverMediaType)
    {
        $this->resolverMediaType = $resolverMediaType;
    }

    public function injectMediaTypeOnLoad(MediaInterface $media)
    {
        $mediaType = $this->resolverMediaType->resolve($media);
        $media->setMediaType($mediaType);
    }
}