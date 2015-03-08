<?php

namespace UEC\MediaUploader\Extension\PdfImageExtractor;

use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfImageInterface;

interface ExtractorManagerInterface
{
    /**
     * Set quality
     *
     * @param int $quality
     * @return ExtractorManagerInterface
     */
    public function setQuality($quality);

    /**
     * Extract all images from pdf
     *
     * @param MediaInterface $media
     * @return array
     */
    public function extractAll(MediaInterface $media);

    /**
     * Extract single image from pdf
     *
     * @param MediaInterface $media
     * @param int $pageNumber
     * @return null|MediaTypePdfImageInterface
     */
    public function extractOne(MediaInterface $media, $pageNumber);
}