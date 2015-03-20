<?php

namespace UEC\Media\Provider\Embed\Destination;

use UEC\Media\Manager\DestinationFilterInterface;
use UEC\Media\Model\MediaInterface;

class DoctrineDestinationFilter implements DestinationFilterInterface
{
    public function supports(MediaInterface $media)
    {
        return $media instanceof MediaEmbedInterface;
    }

    public function filter(MediaInterface $media)
    {
        $entity = new EmbedEntity();
        $entity->setTitle($media->getTitle());
        $entity->setProviderClass(get_class($media->getProvider()));
        return $entity;
    }
}