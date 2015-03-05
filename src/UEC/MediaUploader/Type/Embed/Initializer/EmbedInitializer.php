<?php

namespace UEC\MediaUploader\Type\Embed\Initializer;

use UEC\MediaUploader\Core\Analyzer\AnalyzerInterface;
use UEC\MediaUploader\Core\Initializer\InitializerInterface;
use UEC\MediaUploader\Core\Model\MediaTypeInterface;
use UEC\MediaUploader\Type\Embed\Analyzer\EmbedAnalyzer;
use UEC\MediaUploader\Type\Embed\Model\MediaTypeEmbedInterface;

class EmbedInitializer implements InitializerInterface
{
    public function initializeMediaType(MediaTypeInterface $mediaType, AnalyzerInterface $analyzer)
    {
        if ($mediaType instanceof MediaTypeEmbedInterface) {
            $mediaType->setType($analyzer->getFileInfo(EmbedAnalyzer::INFO_TYPE));
            $mediaType->setTitle($analyzer->getFileInfo(EmbedAnalyzer::INFO_TITLE));
            $mediaType->setDescription($analyzer->getFileInfo(EmbedAnalyzer::INFO_DESCRIPTION));
            $mediaType->setUrl($analyzer->getFileInfo(EmbedAnalyzer::INFO_URL));
            $mediaType->setThumbnailUrl($analyzer->getFileInfo(EmbedAnalyzer::INFO_THUMBNAIL_URL));
            $mediaType->setThumbnailWidth($analyzer->getFileInfo(EmbedAnalyzer::INFO_THUMBNAIL_WIDTH));
            $mediaType->setThumbnailHeight($analyzer->getFileInfo(EmbedAnalyzer::INFO_THUMBNAIL_HEIGHT));
            $mediaType->setHtml($analyzer->getFileInfo(EmbedAnalyzer::INFO_HTML));
            $mediaType->setWidth($analyzer->getFileInfo(EmbedAnalyzer::INFO_WIDTH));
            $mediaType->setHeight($analyzer->getFileInfo(EmbedAnalyzer::INFO_HEIGHT));
            $mediaType->setAuthorName($analyzer->getFileInfo(EmbedAnalyzer::INFO_AUTHOR_NAME));
            $mediaType->setAuthorUrl($analyzer->getFileInfo(EmbedAnalyzer::INFO_AUTHOR_URL));
            $mediaType->setProviderName($analyzer->getFileInfo(EmbedAnalyzer::INFO_PROVIDER_NAME));
            $mediaType->setProviderUrl($analyzer->getFileInfo(EmbedAnalyzer::INFO_PROVIDER_URL));
        }
    }
}