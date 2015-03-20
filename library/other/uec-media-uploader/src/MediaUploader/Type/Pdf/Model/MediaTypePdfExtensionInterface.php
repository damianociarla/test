<?php

namespace UEC\MediaUploader\Type\Pdf\Model;

interface MediaTypePdfExtensionInterface
{
    /**
     * Get id
     *
     * @return int
     */
    public function getId();

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
     * @return MediaTypePdfExtensionInterface
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
     * @return MediaTypePdfExtensionInterface
     */
    public function setPageNumber($pageNumber);
}