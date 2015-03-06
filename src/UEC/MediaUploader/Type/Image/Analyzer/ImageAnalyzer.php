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
        $path   = $adapter->getPath();
        $width  = null;
        $height = null;

        if (false !== $sizes = getimagesize($path)) {
            list($width, $height) = $sizes;
        } elseif (false !== $im = imagecreatefromstring($path)) {
            $width = imagesx($im);
            $height = imagesy($im);
        }

        $this->fileInfo = array(
            self::INFO_WIDTH  => $width,
            self::INFO_HEIGHT => $height,
            self::INFO_SIZE   => $adapter->getSize(),
        );
    }
}