<?php

use Embed\Embed;
use UEC\MediaUploader\Type\Embed\Analyzer\EmbedAnalyzer;
use UEC\MediaUploader\Type\Embed\Parser\ParserInterface;

class EmbedParser implements ParserInterface
{
    public function parse($url)
    {
        $info = Embed::create($url);

        return array(
            EmbedAnalyzer::INFO_TYPE              => $info->getType(),
            EmbedAnalyzer::INFO_TITLE             => $info->getTitle(),
            EmbedAnalyzer::INFO_DESCRIPTION       => $info->getDescription(),
            EmbedAnalyzer::INFO_URL               => $info->getUrl(),
            EmbedAnalyzer::INFO_THUMBNAIL_URL     => $info->getImage(),
            EmbedAnalyzer::INFO_THUMBNAIL_WIDTH   => $info->getImageWidth(),
            EmbedAnalyzer::INFO_THUMBNAIL_HEIGHT  => $info->getImageHeight(),
            EmbedAnalyzer::INFO_HTML              => $info->getCode(),
            EmbedAnalyzer::INFO_WIDTH             => $info->getWidth(),
            EmbedAnalyzer::INFO_HEIGHT            => $info->getHeight(),
            EmbedAnalyzer::INFO_AUTHOR_NAME       => $info->getAuthorName(),
            EmbedAnalyzer::INFO_AUTHOR_URL        => $info->getAuthorUrl(),
            EmbedAnalyzer::INFO_PROVIDER_NAME     => $info->getProviderName(),
            EmbedAnalyzer::INFO_PROVIDER_URL      => $info->getProviderUrl(),
        );
    }
}