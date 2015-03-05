<?php

namespace UEC\MediaUploader\Type\Image\Configuration;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;
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

    public function supports(AdapterInterface $adapter)
    {
        return true;
    }

    public function getSupportedAdapters()
    {
        return;
    }
}