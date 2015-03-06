<?php

use UEC\MediaUploader\Type\Pdf\Parser\ParserInterface;

class PdfParser implements ParserInterface
{
    public function getNumberOfPages($file)
    {
        $document = new \Imagick($file);
        return $document->getNumberImages();
    }
}