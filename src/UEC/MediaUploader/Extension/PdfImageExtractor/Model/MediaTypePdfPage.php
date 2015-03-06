<?php

namespace UEC\MediaUploader\Extension\PdfImageExtractor\Model;

use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfInterface;

abstract class MediaTypePdfPage implements MediaTypePdfPageInterface
{
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
    protected $mediaImage;

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

    public function getMediaImage()
    {
        return $this->mediaImage;
    }

    public function setMediaImage(MediaInterface $mediaImage)
    {
        $this->mediaImage = $mediaImage;
        return $this;
    }
}