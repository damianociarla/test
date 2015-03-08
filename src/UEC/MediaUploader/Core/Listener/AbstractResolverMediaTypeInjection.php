<?php

namespace UEC\MediaUploader\Core\Listener;

use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Core\Resolver\ResolverMediaTypeInterface;

abstract class AbstractResolverMediaTypeInjection
{
    protected $resolverMediaType;

    function __construct(ResolverMediaTypeInterface $resolverMediaType)
    {
        $this->resolverMediaType = $resolverMediaType;
    }

    public function injectResolverMediaTypeOnLoad(MediaInterface $media)
    {
        $media->setResolverMediaType($this->resolverMediaType);
    }
}