<?php

namespace UEC\MediaUploader\Type\Pdf\Model;

use UEC\MediaUploader\Core\Model\MediaType;

abstract class MediaTypePdf extends MediaType implements MediaTypePdfInterface
{
    /**
     * @var int
     */
    protected $size;

    /**
     * @var int
     */
    protected $totalPageNumber;

    /**
     * @var array
     */
    protected $images;

    function __construct()
    {
        $this->images = array();
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    public function getTotalPageNumber()
    {
        return $this->totalPageNumber;
    }

    public function setTotalPageNumber($totalPageNumber)
    {
        $this->totalPageNumber = $totalPageNumber;
        return $this;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function setImages($images)
    {
        $this->images = $images;
        return $this;
    }
}