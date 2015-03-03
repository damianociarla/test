<?php

namespace UEC\MediaUploader\Type\Image\Services;

use UEC\MediaUploader\Core\Services\MediaManagerServices;
use UEC\MediaUploader\Type\Image\Uploader\Validator\ImageValidator;

class ImageMediaManagerServices extends MediaManagerServices
{
    public function getDefaultValidators()
    {
        return array(
            new ImageValidator(),
        );
    }
}