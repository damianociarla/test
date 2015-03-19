<?php

namespace UEC\MediaUploader\Core\Listener;

use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Core\Resolver\MediaTypeResolverInterface;

abstract class AbstractMediaTypeResolverInjection
{
    protected $mediaTypeResolver;

    function __construct(MediaTypeResolverInterface $mediaTypeResolver)
    {
        $this->mediaTypeResolver = $mediaTypeResolver;
    }

    public function injectMediaTypeResolverOnLoad(MediaInterface $media)
    {
        $media->setMediaTypeResolver($this->mediaTypeResolver);
    }
}