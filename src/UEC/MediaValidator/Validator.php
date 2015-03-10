<?php

namespace UEC\MediaValidator;

use UEC\Media\MediaInterface;

class Validator
{
    /**
     * @param MediaInterface $media
     * @param array $validators
     * @return bool
     */
    public function validate(MediaInterface $media, array $validators)
    {
        foreach ($validators as $validator) {
            if (!$validator instanceof MediaValidatorInterface) {
                throw new \UnexpectedValueException('Validator must be an instanceof MediaValidatorInterface');
            }
            if ($validator->supports($media) && !$validator->validate($media)) {
                return false;
            }
        }

        return true;
    }
}