<?php

namespace UEC\Media\Provider\Embed\Destination;

use UEC\Media\Manager\DestinationFilterInterface;
use UEC\Media\Model\MediaInterface;
use UEC\Media\Provider\Embed\Model\MediaEmbedInterface;

class ConsoleDestinationFilter implements DestinationFilterInterface
{
    public function supports(MediaInterface $media)
    {
        return $media instanceof MediaEmbedInterface;
    }

    public function filter(MediaInterface $media)
    {
        return array(
            'title' => $media->getTitle(),
            'description' => $media->getDescription(),
        );
    }
}