<?php

namespace UEC\MediaUploader\Core\Factory;

use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Core\Services\MediaManagerServicesInterface;

interface MediaManagerServicesFactoryInterface
{
    /**
     * Get an instance of MediaManagerServicesInterface
     *
     * @throws \UnexpectedValueException
     * @throws \OutOfBoundsException
     *
     * @param MediaInterface|string $context
     * @return MediaManagerServicesInterface
     */
    public function get($context);
}