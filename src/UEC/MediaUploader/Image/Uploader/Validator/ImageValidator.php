<?php

namespace UEC\MediaUploader\Image\Uploader\Validator;

use UEC\MediaUploader\Core\Uploader\AdapterValidatorInterface;
use UEC\MediaUploader\Core\Uploader\UploadAdapterInterface;

class ImageValidator implements AdapterValidatorInterface
{
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

        return true;
    }
}