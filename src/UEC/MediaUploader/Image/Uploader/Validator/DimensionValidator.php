<?php

namespace UEC\MediaUploader\Image\Uploader\Validator;

use UEC\MediaUploader\Core\Uploader\AdapterValidatorInterface;
use UEC\MediaUploader\Core\Uploader\UploadAdapterInterface;

class DimensionValidator implements AdapterValidatorInterface
{
    const DIMENSION_MIN_WIDTH = 'minWidth';
    const DIMENSION_MAX_WIDTH = 'maxWidth';
    const DIMENSION_MIN_HEIGHT = 'minHeight';
    const DIMENSION_MAX_HEIGHT = 'maxHeight';

    private $minWidth;
    private $maxWidth;
    private $minHeight;
    private $maxHeight;

    function __construct(array $config = array())
    {
        $atLeastOptionSet = false;

        foreach (self::getDimensions() as $dimension) {
            if (isset($config[$dimension]) && is_int($config[$dimension])) {
                $this->$dimension = $config[$dimension];
                $atLeastOptionSet = true;
            }
        }

        if (!$atLeastOptionSet) {
            throw new \UnexpectedValueException('You have to set at least one control option');
        }
    }

    public function supports(UploadAdapterInterface $adapter)
    {
        return true;
    }

    public function validate(UploadAdapterInterface $adapter)
    {
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