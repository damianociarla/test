<?php

namespace UEC\MediaUploader\Type\Image\Analyzer;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;
use UEC\MediaUploader\Core\Adapter\Common\BlobFileInterface;
use UEC\MediaUploader\Core\Analyzer\AbstractAnalyzer;

class ImageAnalyzer extends AbstractAnalyzer
{
    const INFO_WIDTH  = 'width';
    const INFO_HEIGHT = 'height';
    const INFO_SIZE   = 'size';

    public function analyze(AdapterInterface $adapter)
    {
        $width  = 0;
        $height = 0;

        if ($adapter instanceof BlobFileInterface) {
            $im = imagecreatefromstring($adapter->getBlob());
            $width = imagesx($im);
            $height = imagesy($im);
        } else {
            list($width, $height) = getimagesize($adapter->getPath());
        }

        $this->fileInfo = array(
            self::INFO_WIDTH  => $width,
            self::INFO_HEIGHT => $height,
            self::INFO_SIZE   => $adapter->getSize(),
        );
    }
}