<?php

namespace UEC\MediaUploader\Type\Image\Services;

use UEC\MediaUploader\Core\Services\ContextConfiguration;
use UEC\MediaUploader\Type\Image\Uploader\Validator\ImageValidator;

class ImageContextConfiguration extends ContextConfiguration
{
    public function getDefaultValidators()
    {
        return array(
            new ImageValidator(),
        );
    }
}