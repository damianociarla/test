<?php

namespace UEC\MediaUploader\Type\Embed\Adapter\Validator;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;
use UEC\MediaUploader\Core\Adapter\Validator\AdapterValidatorInterface;
use UEC\MediaUploader\Type\Embed\Adapter\EmbedFileInterface;

class EmbedFileAdapterRequiredValidator implements AdapterValidatorInterface
{
    public function supports(AdapterInterface $adapter)
    {
        return true;
    }

    public function validate(AdapterInterface $adapter)
    {
        return $adapter instanceof EmbedFileInterface;
    }
}