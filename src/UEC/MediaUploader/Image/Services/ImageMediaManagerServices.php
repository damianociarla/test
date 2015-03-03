<?php

namespace UEC\MediaUploader\Image\Services;

use UEC\MediaUploader\Core\Services\MediaManagerServices;
use UEC\MediaUploader\Image\Uploader\Validator\ImageValidator;

class ImageMediaManagerServices extends MediaManagerServices
{
    public function getDefaultValidators()
    {
        return array(
            new ImageValidator(),
        );
    }
}