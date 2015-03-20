<?php

namespace UEC\Media\Provider\Embed\Destination;

use UEC\Media\Manager\DestinationFilterInterface;
use UEC\Media\Model\MediaInterface;
use UEC\Media\Provider\Embed\Model\MediaEmbedInterface;
use UEC\Media\Provider\Embed\Parser\ParserInterface;

class ConsoleDestinationFilter implements DestinationFilterInterface
{
    public function supports(MediaInterface $media)
    {
        return $media instanceof MediaEmbedInterface;
    }

    public function filter(MediaInterface $media)
    {
        return array(
            ParserInterface::INFO_TYPE              => $media->getType(),
            ParserInterface::INFO_TITLE             => $media->getTitle(),
            ParserInterface::INFO_DESCRIPTION       => $media->getDescription(),
            ParserInterface::INFO_URL               => $media->getUrl(),
            ParserInterface::INFO_THUMBNAIL_URL     => $media->getThumbnailUrl(),
            ParserInterface::INFO_THUMBNAIL_WIDTH   => $media->getThumbnailWidth(),
            ParserInterface::INFO_THUMBNAIL_HEIGHT  => $media->getThumbnailHeight(),
            ParserInterface::INFO_HTML              => $media->getHtml(),
            ParserInterface::INFO_WIDTH             => $media->getWidth(),
            ParserInterface::INFO_HEIGHT            => $media->getHeight(),
            ParserInterface::INFO_AUTHOR_NAME       => $media->getAuthorName(),
            ParserInterface::INFO_AUTHOR_URL        => $media->getAuthorUrl(),
            ParserInterface::INFO_PROVIDER_NAME     => $media->getProviderName(),
            ParserInterface::INFO_PROVIDER_URL      => $media->getProviderUrl(),
        );
    }
}