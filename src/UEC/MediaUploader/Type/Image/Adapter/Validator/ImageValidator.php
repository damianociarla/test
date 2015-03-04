<?php

namespace UEC\MediaUploader\Type\Image\Adapter\Validator;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;
use UEC\MediaUploader\Core\Adapter\Validator\AdapterValidatorInterface;

class ImageValidator implements AdapterValidatorInterface
{
    public function supports(AdapterInterface $adapter)
    {
        return true;
    }

    public function validate(AdapterInterface $adapter)
    {
        if ($adapter->isLocal()) {
            if (exif_imagetype($adapter->getPath()) === false) {
                return false;
            }
        } else {
            $headers = get_headers($adapter->getPath(), 1);
            if (strpos($headers['Content-Type'], 'image/') === false) {
                return false;
            }
        }

        return true;
    }
}