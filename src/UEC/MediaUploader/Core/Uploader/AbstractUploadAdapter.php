<?php

namespace UEC\MediaUploader\Core\Uploader;

abstract class AbstractUploadAdapter implements UploadAdapterInterface
{
    private $validators = array();

    public function addValidator(AdapterValidatorInterface $validator)
    {
        $this->validators[] = $validator;
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