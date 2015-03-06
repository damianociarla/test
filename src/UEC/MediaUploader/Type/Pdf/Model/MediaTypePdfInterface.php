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
     * Get pages
     *
     * @return array
     */
    public function getPages();

    /**
     * Set pages
     *
     * @param array $pages
     * @return MediaTypePdfInterface
     */
    public function setPages($pages);
}