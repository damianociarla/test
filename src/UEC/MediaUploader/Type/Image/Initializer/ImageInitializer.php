<?php

namespace UEC\MediaUploader\Type\Image\Initializer;

use UEC\MediaUploader\Core\Analyzer\AnalyzerInterface;
use UEC\MediaUploader\Core\Initializer\InitializerInterface;
use UEC\MediaUploader\Core\Model\MediaTypeInterface;
use UEC\MediaUploader\Type\Image\Analyzer\ImageAnalyzer;
use UEC\MediaUploader\Type\Image\Model\MediaTypeImageInterface;

class ImageInitializer implements InitializerInterface
{
    public function initializeMediaType(MediaTypeInterface $mediaType, AnalyzerInterface $analyzer)
    {
        if ($mediaType instanceof MediaTypeImageInterface) {
            $mediaType->setWidth($analyzer->getFileInfo(ImageAnalyzer::INFO_WIDTH));
            $mediaType->setHeight($analyzer->getFileInfo(ImageAnalyzer::INFO_HEIGHT));
            $mediaType->setSize($analyzer->getFileInfo(ImageAnalyzer::INFO_SIZE));
        }
    }
}