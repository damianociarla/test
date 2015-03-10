<?php

namespace UEC\MediaValidator;

use UEC\Media\MediaInterface;

interface ValidatorInterface
{
    /**
     * Validate a media
     *
     * @param MediaInterface $media
     * @param array $validators
     * @return bool
     */
    public function validate(MediaInterface $media, array $validators);
}