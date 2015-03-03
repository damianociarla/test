<?php

namespace UEC\MediaUploader\Core\Uploader\Common\Validator;

use UEC\MediaUploader\Core\Uploader\AdapterValidatorInterface;
use UEC\MediaUploader\Core\Uploader\UploadAdapterInterface;

class SizeValidator implements AdapterValidatorInterface
{
    const SIZE_MIN = 'min';
    const SIZE_MAX = 'max';

    private $min;
    private $max;

    function __construct(array $config)
    {
        if (!isset($config[self::SIZE_MIN]) && !isset($config[self::SIZE_MAX])) {
            throw new \UnexpectedValueException('You must configure min or max value');
        }

        $this->min = isset($config[self::SIZE_MIN]) ? $config[self::SIZE_MIN] : null;
        $this->max = isset($config[self::SIZE_MAX]) ? $config[self::SIZE_MAX] : null;
    }

    public function supports(UploadAdapterInterface $adapter)
    {
        return true;
    }

    public function validate(UploadAdapterInterface $adapter)
    {
        $size = $adapter->getSize();

        if (empty($size)) {
            return false;
        }

        if (null !== $this->min && $size < $this->min) {
            return false;
        }

        if (null !== $this->max && $size > $this->max) {
            return false;
        }

        return true;
    }
}