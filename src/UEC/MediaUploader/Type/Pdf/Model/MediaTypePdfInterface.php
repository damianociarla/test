<?php

namespace UEC\MediaUploader\Type\Pdf\Model;

interface MediaTypePdfInterface
{
    /**
     * Get size
     *
     * @return int
     */
    public function getSize();

    /**
     * Set size
     *
     * @param int $size
     * @return MediaTypePdfInterface
     */
    public function setSize($size);

    /**
     * Get totalPageNumber
     *
     * @return int
     */
    public function getTotalPageNumber();

    /**
     * Set totalPageNumber
     *
     * @param int $totalPageNumber
     * @return MediaTypePdfInterface
     */
    public function setTotalPageNumber($totalPageNumber);

    /**
     * Get images
     *
     * @return array
     */
    public function getImages();

    /**
     * Set images
     *
     * @param array $images
     * @return MediaTypePdfInterface
     */
    public function setImages($images);
}