<?php

namespace UEC\MediaUploader\Type\Pdf\Resolver;

use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfImageInterface;
use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfInterface;

interface PageResolverInterface
{
    /**
     * Get instance of MediaTypePdfImage
     *
     * @param MediaTypePdfInterface $mediaTypePdf
     * @param int $number
     * @return MediaTypePdfImageInterface
     */
    public function getPage(MediaTypePdfInterface $mediaTypePdf, $number);
}