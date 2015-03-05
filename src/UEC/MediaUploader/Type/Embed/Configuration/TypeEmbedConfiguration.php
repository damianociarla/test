<?php

namespace UEC\MediaUploader\Type\Embed\Configuration;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;
use UEC\MediaUploader\Core\Adapter\Validator\Common\UrlValidator;
use UEC\MediaUploader\Core\Configuration\AbstractTypeConfiguration;
use UEC\MediaUploader\Type\Embed\Adapter\EmbedFileInterface;

class TypeEmbedConfiguration extends AbstractTypeConfiguration
{
    public function getDefaultValidators()
    {
        return array(
            new UrlValidator(),
        );
    }

    public function supports(AdapterInterface $adapter)
    {
        return $adapter instanceof EmbedFileInterface;
    }

    public function getAdaptersSupported()
    {
        return array(
            'UEC\MediaUploader\Type\Embed\Adapter\EmbedFileInterface',
        );
    }
}