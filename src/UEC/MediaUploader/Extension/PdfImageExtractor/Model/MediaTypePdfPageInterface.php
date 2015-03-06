<?php

namespace UEC\MediaUploader\Extension\PdfImageExtractor\Model;

use UEC\MediaUploader\Core\Model\MediaInterface;
use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfInterface;

interface MediaTypePdfPageInterface
{
    /**
     * Get mediaPdf
     *
     * @return MediaTypePdfInterface
     */
    public function getMediaPdf();

    /**
     * Set mediaPdf
     *
     * @param MediaTypePdfInterface $mediaPdf
     * @return MediaTypePdfPage
     */
    public function setMediaPdf(MediaTypePdfInterface $mediaPdf);

    /**
     * Get pageNumber
     *
     * @return int
     */
    public function getPageNumber();

    /**
     * Set pageNumber
     *
     * @param int $pageNumber
     * @return MediaTypePdfPage
     */
    public function setPageNumber($pageNumber);

    /**
     * Get mediaImage
     *
     * @return MediaInterface
     */
    public function getMediaImage();

    /**
     * Set mediaImage
     *
     * @param MediaInterface $mediaImage
     * @return MediaTypePdfPage
     */
    public function setMediaImage(MediaInterface $mediaImage);
}