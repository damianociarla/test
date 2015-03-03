<?php

namespace UEC\MediaUploader\Type\Image\Analyzer;

use UEC\MediaUploader\Core\Analyzer\Analyzer;
use UEC\MediaUploader\Core\Uploader\UploadAdapterInterface;

class ImageAnalyzer extends Analyzer
{
    const INFO_WIDTH  = 'width';
    const INFO_HEIGHT = 'height';
    const INFO_SIZE   = 'size';

    public function analyze(UploadAdapterInterface $adapter)
    {
        list($width, $height) = getimagesize($adapter->getPath());

        $this->fileInfo = array(
            self::INFO_WIDTH  => $width,
            self::INFO_HEIGHT => $height,
            self::INFO_SIZE   => $adapter->getSize(),
        );
    }
}