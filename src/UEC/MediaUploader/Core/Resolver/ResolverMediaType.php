<?php

namespace UEC\MediaUploader\Core\Resolver;

use UEC\MediaUploader\Core\Factory\MediaManagerServicesFactoryInterface;
use UEC\MediaUploader\Core\Model\MediaInterface;

class ResolverMediaType implements ResolverMediaTypeInterface
{
    protected $mediaManagerServicesFactory;

    function __construct(MediaManagerServicesFactoryInterface $mediaManagerServicesFactory)
    {
        $this->mediaManagerServicesFactory = $mediaManagerServicesFactory;
    }

    public function resolve(MediaInterface $media)
    {
        $mediaTypeManager = $this->mediaManagerServicesFactory->get($media);
        return $mediaTypeManager->getMediaTypeManager()->findByMedia($media);
    }
}