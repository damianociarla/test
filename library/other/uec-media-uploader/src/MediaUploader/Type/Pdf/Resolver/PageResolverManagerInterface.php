<?php

namespace UEC\MediaUploader\Type\Pdf\Resolver;

use UEC\MediaUploader\Core\Model\MediaTypeInterface;

interface PageResolverManagerInterface
{
    /**
     * Get instance of MediaTypePdfImage
     *
     * @return MediaTypeInterface|null
     */
    public function image();
}