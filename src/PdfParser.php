<?php

use UEC\MediaUploader\Type\Pdf\Parser\PdfParserInterface;

class PdfParser implements PdfParserInterface
{
    public function extractPageFromPdf($path, $pageNumber, $quality, $output)
    {
        $img = new \Imagick($path);
        $img->setResolution($quality, $quality);
        $img->setIteratorIndex($pageNumber);
        $img->setImageFormat('jpg');

        return $img->writeImage($output);
    }

    public function getNumberOfPages($file)
    {
        $document = new \Imagick($file);
        return $document->getNumberImages();
    }
}