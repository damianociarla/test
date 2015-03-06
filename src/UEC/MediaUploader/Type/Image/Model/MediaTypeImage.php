<?php

namespace UEC\MediaUploader\Type\Image\Model;

use UEC\MediaUploader\Core\Model\MediaType;

abstract class MediaTypeImage extends MediaType implements MediaTypeImageInterface
{
    /**
     * @var int
     */
    protected $width;

    /**
     * @var int
     */
    protected $height;

    /**
     * @var int
     */
    protected $size;

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width = null)
    {
        $this->width = $width;
        return $this;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height = null)
    {
        $this->height = $height;
        return $this;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size = null)
    {
        $this->size = $size;
        return $this;
    }
}