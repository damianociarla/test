<?php

namespace UEC\MediaUploader\Type\Image\Model;

use UEC\MediaUploader\Core\Model\MediaTypeInterface;

interface MediaTypeImageInterface extends MediaTypeInterface
{
    /**
     * Get width
     *
     * @return int
     */
    public function getWidth();

    /**
     * Set width
     *
     * @param int $width
     * @return MediaTypeImageInterface
     */
    public function setWidth($width = null);

    /**
     * Get height
     *
     * @return int
     */
    public function getHeight();

    /**
     * Set height
     *
     * @param int $height
     * @return MediaTypeImageInterface
     */
    public function setHeight($height = null);

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
     * @return MediaTypeImageInterface
     */
    public function setSize($size = null);
}