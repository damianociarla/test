<?php

namespace UEC\MediaUploader\Core\Adapter\Validator\Common;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;
use UEC\MediaUploader\Core\Adapter\Validator\AdapterValidatorInterface;

class UrlValidator implements AdapterValidatorInterface
{
    public function supports(AdapterInterface $adapter)
    {
        return true;
    }

    public function validate(AdapterInterface $adapter)
    {
        return filter_var($adapter->getPath(), FILTER_VALIDATE_URL);
    }
}