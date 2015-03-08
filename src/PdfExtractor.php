<?php

use UEC\MediaUploader\Extension\PdfImageExtractor\Extractor\ExtractorInterface;

class PdfExtractor implements ExtractorInterface
{
    public function extractPageFromPdf($path, $pageNumber, $quality, $output = null)
    {
        $img = new \Imagick($path);
        $img->setResolution($quality, $quality);
        $img->setIteratorIndex($pageNumber);
        $img->setImageFormat('jpg');

        if (null !== $output) {
            return $img->writeImage($output);
        } else {
            return $img->getImageBlob();
        }
    }
}