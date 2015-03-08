<?php

namespace UEC\MediaUploader\Extension\PdfImageExtractor\Resolver;

use UEC\MediaUploader\Extension\PdfImageExtractor\Model\MediaTypePdfImageManagerInterface;
use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfInterface;
use UEC\MediaUploader\Type\Pdf\Resolver\PageImageResolverInterface;

class PageImageResolver implements PageImageResolverInterface
{
    private $mediaTypePdfImageManager;

    function __construct(MediaTypePdfImageManagerInterface $mediaTypePdfImageManager)
    {
        $this->mediaTypePdfImageManager = $mediaTypePdfImageManager;
    }

    public function getPage(MediaTypePdfInterface $mediaTypePdf, $number)
    {
        $this->mediaTypePdfImageManager->findByMediaAndPage($mediaTypePdf, $number);
    }
}