<?php

namespace UEC\MediaUploader\Type\Image\Configuration;

use UEC\MediaUploader\Core\Configuration\AbstractTypeConfiguration;
use UEC\MediaUploader\Type\Image\Adapter\Validator\ImageValidator;

class TypeImageConfiguration extends AbstractTypeConfiguration
{
    public function getDefaultValidators()
    {
        return array(
            new ImageValidator(),
        );
    }
}