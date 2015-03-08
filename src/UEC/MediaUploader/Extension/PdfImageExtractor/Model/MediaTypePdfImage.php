<?php

namespace UEC\MediaUploader\Extension\PdfImageExtractor\Model;

use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfImageInterface;
use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfInterface;

abstract class MediaTypePdfImage implements MediaTypePdfImageInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var MediaTypePdfInterface
     */
    protected $mediaPdf;

    /**
     * @var int
     */
    protected $pageNumber;

    /**
     * @var MediaInterface
     */
    protected $media;

    public function getId()
    {
        return $this->id;
    }

    public function getMediaPdf()
    {
        return $this->mediaPdf;
    }

    public function setMediaPdf(MediaTypePdfInterface $mediaPdf)
    {
        $this->mediaPdf = $mediaPdf;
        return $this;
    }

    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;
        return $this;
    }

    public function getMedia()
    {
        return $this->media;
    }

    public function setMedia(MediaInterface $media)
    {
        $this->media = $media;
        return $this;
    }
}