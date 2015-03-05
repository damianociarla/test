<?php

namespace UEC\MediaUploader\Type\Embed\Configuration;

use UEC\MediaUploader\Core\Adapter\Validator\Common\UrlValidator;
use UEC\MediaUploader\Core\Configuration\AbstractTypeConfiguration;
use UEC\MediaUploader\Type\Embed\Adapter\Validator\EmbedFileAdapterRequiredValidator;

class TypeEmbedConfiguration extends AbstractTypeConfiguration
{
    public function getDefaultValidators()
    {
        return array(
            new EmbedFileAdapterRequiredValidator(),
            new UrlValidator(),
        );
    }
}