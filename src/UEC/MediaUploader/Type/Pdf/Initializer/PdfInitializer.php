<?php

namespace UEC\MediaUploader\Type\Pdf\Initializer;

use UEC\MediaUploader\Core\Analyzer\AnalyzerInterface;
use UEC\MediaUploader\Core\Initializer\InitializerInterface;
use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Core\Model\MediaTypeInterface;
use UEC\MediaUploader\Type\Pdf\Analyzer\PdfAnalyzer;
use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfInterface;

class PdfInitializer implements InitializerInterface
{
    public function initializeMedia(MediaInterface $media, AnalyzerInterface $analyzer)
    {
        return;
    }

    public function initializeMediaType(MediaTypeInterface $mediaType, AnalyzerInterface $analyzer)
    {
        if ($mediaType instanceof MediaTypePdfInterface) {
            $mediaType->setSize($analyzer->getFileInfo(PdfAnalyzer::INFO_SIZE));
            $mediaType->setTotalPageNumber($analyzer->getFileInfo(PdfAnalyzer::INFO_TOT_PAGE));
        }
    }
}