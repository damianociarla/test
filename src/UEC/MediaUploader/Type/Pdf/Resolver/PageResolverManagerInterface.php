<?php

namespace UEC\MediaUploader\Type\Pdf\Resolver;

use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfImageInterface;

interface PageResolverManagerInterface
{
    /**
     * Get instance of MediaTypePdfImage
     *
     * @return MediaTypePdfImageInterface|null
     */
    public function image();
}