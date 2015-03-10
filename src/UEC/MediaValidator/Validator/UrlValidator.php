<?php

namespace UEC\MediaValidator\Validator;

use UEC\Media\Adapter\AdapterInterface;
use UEC\MediaValidator\AdapterValidatorInterface;

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