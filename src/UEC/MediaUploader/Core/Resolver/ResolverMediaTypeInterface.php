<?php

namespace UEC\MediaUploader\Core\Resolver;

use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Core\Model\MediaTypeInterface;

interface ResolverMediaTypeInterface
{
    /**
     * Get media type from media
     *
     * @param MediaInterface $media
     * @return MediaTypeInterface
     */
    public function resolve(MediaInterface $media);
}