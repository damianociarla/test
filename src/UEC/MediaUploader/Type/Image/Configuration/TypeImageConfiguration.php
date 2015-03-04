<?php

namespace UEC\MediaUploader\Type\Image\Configuration;

use UEC\MediaUploader\Core\Configuration\TypeConfiguration;
use UEC\MediaUploader\Type\Image\Uploader\Validator\ImageValidator;

class TypeImageConfiguration extends TypeConfiguration
{
    public function getDefaultValidators()
    {
        return array(
            new ImageValidator(),
        );
    }
}