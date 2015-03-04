<?php

namespace UEC\MediaUploader\Type\Image\Analyzer;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;
use UEC\MediaUploader\Core\Analyzer\AbstractAnalyzer;

class ImageAnalyzer extends AbstractAnalyzer
{
    const INFO_WIDTH  = 'width';
    const INFO_HEIGHT = 'height';
    const INFO_SIZE   = 'size';

    public function analyze(AdapterInterface $adapter)
    {
        list($width, $height) = getimagesize($adapter->getPath());

        $this->fileInfo = array(
            self::INFO_WIDTH  => $width,
            self::INFO_HEIGHT => $height,
            self::INFO_SIZE   => $adapter->getSize(),
        );
    }
}