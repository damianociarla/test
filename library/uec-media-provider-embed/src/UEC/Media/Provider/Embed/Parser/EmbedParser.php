<?php

namespace UEC\Media\Provider\Embed\Parser;

use Embed\Embed;

class EmbedParser implements ParserInterface
{
    public function parse($url)
    {
        $info = Embed::create($url);

        return array(
            ParserInterface::INFO_TYPE              => $info->getType(),
            ParserInterface::INFO_TITLE             => $info->getTitle(),
            ParserInterface::INFO_DESCRIPTION       => $info->getDescription(),
            ParserInterface::INFO_URL               => $info->getUrl(),
            ParserInterface::INFO_THUMBNAIL_URL     => $info->getImage(),
            ParserInterface::INFO_THUMBNAIL_WIDTH   => $info->getImageWidth(),
            ParserInterface::INFO_THUMBNAIL_HEIGHT  => $info->getImageHeight(),
            ParserInterface::INFO_HTML              => $info->getCode(),
            ParserInterface::INFO_WIDTH             => $info->getWidth(),
            ParserInterface::INFO_HEIGHT            => $info->getHeight(),
            ParserInterface::INFO_AUTHOR_NAME       => $info->getAuthorName(),
            ParserInterface::INFO_AUTHOR_URL        => $info->getAuthorUrl(),
            ParserInterface::INFO_PROVIDER_NAME     => $info->getProviderName(),
            ParserInterface::INFO_PROVIDER_URL      => $info->getProviderUrl(),
        );
    }
}