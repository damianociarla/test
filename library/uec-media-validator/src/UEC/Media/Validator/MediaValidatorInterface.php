<?php

namespace UEC\Media\Validator;

use UEC\Media\MediaInterface;

interface MediaValidatorInterface
{
    /**
     * Check if validator is support from adapter
     *
     * @param MediaInterface $media
     * @return bool
     */
    public function supports(MediaInterface $media);

    /**
     * Validate an adapter
     *
     * @param MediaInterface $media
     * @return bool
     */
    public function validate(MediaInterface $media);
}