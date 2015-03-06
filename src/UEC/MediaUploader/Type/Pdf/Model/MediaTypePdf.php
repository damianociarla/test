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
    protected $pages;

    function __construct()
    {
        $this->pages = array();
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

    public function getPages()
    {
        return $this->pages;
    }

    public function setPages($pages)
    {
        $this->pages = $pages;
        return $this;
    }
}