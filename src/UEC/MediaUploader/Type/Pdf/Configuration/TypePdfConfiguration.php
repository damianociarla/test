<?php

namespace UEC\MediaUploader\Type\Pdf\Configuration;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;
use UEC\MediaUploader\Core\Adapter\Common\LocalFileInterface;
use UEC\MediaUploader\Core\Adapter\Common\RemoteFileInterface;
use UEC\MediaUploader\Core\Adapter\Common\UploadFileInterface;
use UEC\MediaUploader\Core\Configuration\AbstractTypeConfiguration;

class TypePdfConfiguration extends AbstractTypeConfiguration
{
    public function getDefaultValidators()
    {
        return array();
    }

    public function supports(AdapterInterface $adapter)
    {
        return (
            $adapter instanceof LocalFileInterface ||
            $adapter instanceof RemoteFileInterface ||
            $adapter instanceof UploadFileInterface
        );
    }

    public function getSupportedAdapters()
    {
        return array(
            'UEC\MediaUploader\Core\Adapter\Common\LocalFileInterface',
            'UEC\MediaUploader\Core\Adapter\Common\RemoteFileInterface',
            'UEC\MediaUploader\Core\Adapter\Common\UploadFileInterface',
        );
    }
}