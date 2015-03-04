<?php

namespace UEC\MediaUploader\Core\Adapter;

use UEC\MediaUploader\Core\Adapter\Validator\AdapterValidatorInterface;

abstract class AbstractAdapter implements AdapterInterface
{
    private $validators = array();

    public function addValidator(AdapterValidatorInterface $validator, $atBeginning = false)
    {
        if ($atBeginning) {
            array_unshift($this->validators, $validator);
        } else {
            $this->validators[] = $validator;
        }

        return $this;
    }

    public function getValidators()
    {
        return $this->validators;
    }

    public function isValid()
    {
        foreach ($this->validators as $validator) {
            if ($validator->supports($this) && !$validator->validate($this)) {
                return false;
            }
        }

        return true;
    }
}