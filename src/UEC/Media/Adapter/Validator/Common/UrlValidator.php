<?php

namespace UEC\Media\Adapter\Validator\Common;

use UEC\Media\Adapter\AdapterInterface;
use UEC\Media\Adapter\Validator\AdapterValidatorInterface;

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