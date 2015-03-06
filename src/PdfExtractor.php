<?php

use UEC\MediaUploader\Extension\PdfImageExtractor\Extractor\ExtractorInterface;

class PdfExtractor implements ExtractorInterface
{
    public function extractPageFromPdf($path, $pageNumber, $quality, $output)
    {
        $img = new \Imagick($path);
        $img->setResolution($quality, $quality);
        $img->setIteratorIndex($pageNumber);
        $img->setImageFormat('jpg');

        return $img->writeImage($output);
    }
}