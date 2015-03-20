<?php

namespace UEC\MediaValidator\Validator;

use UEC\Media\MediaInterface;
use UEC\MediaValidator\MediaValidatorInterface;

class UrlValidator implements MediaValidatorInterface
{
    public function supports(MediaInterface $media)
    {
        return true;
    }

    public function validate(MediaInterface $media)
    {
        return filter_var($media->getPath(), FILTER_VALIDATE_URL);
    }
}