<?php

namespace UEC\MediaUploader\Image\Uploader\Validator;

use UEC\MediaUploader\Core\Uploader\AdapterValidatorInterface;
use UEC\MediaUploader\Core\Uploader\UploadAdapterInterface;

class ImageValidator implements AdapterValidatorInterface
{
    const DIMENSION_MIN_WIDTH = 'minWidth';
    const DIMENSION_MAX_WIDTH = 'maxWidth';
    const DIMENSION_MIN_HEIGHT = 'minHeight';
    const DIMENSION_MAX_HEIGHT = 'maxHeight';

    private $minWidth;
    private $maxWidth;
    private $minHeight;
    private $maxHeight;
    private $validateDimension;

    function __construct(array $config = array())
    {
        $this->validateDimension = false;

        foreach (self::getDimensions() as $dimension) {
            if (isset($config[$dimension]) && is_int($config[$dimension])) {
                $this->$dimension = $config[$dimension];
                $this->validateDimension = true;
            }
        }
    }

    public function supports(UploadAdapterInterface $adapter)
    {
        return true;
    }

    public function validate(UploadAdapterInterface $adapter)
    {
        if ($adapter->isPhysical()) {
            if (exif_imagetype($adapter->getPath()) === false) {
                return false;
            }
        } else {
            $headers = get_headers($adapter->getPath(), 1);
            if (strpos($headers['Content-Type'], 'image/') === false) {
                return false;
            }
        }

        if ($this->validateDimension) {
            list($width, $height) = getimagesize($adapter->getPath());

            if (null !== $this->minWidth && $width < $this->minWidth) {
                return false;
            }
            if (null !== $this->maxWidth && $width > $this->maxWidth) {
                return false;
            }
            if (null !== $this->minHeight && $height < $this->minHeight) {
                return false;
            }
            if (null !== $this->maxHeight && $height > $this->maxHeight) {
                return false;
            }
        }

        return true;
    }

    private static function getDimensions()
    {
        return array(
            self::DIMENSION_MIN_WIDTH,
            self::DIMENSION_MAX_WIDTH,
            self::DIMENSION_MIN_HEIGHT,
            self::DIMENSION_MAX_HEIGHT,
        );
    }
}