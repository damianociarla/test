<?php

namespace UEC\MediaUploader\Type\Pdf\Model;

use UEC\MediaUploader\Type\Pdf\Resolver\PageResolverManagerInterface;

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
     * @param int $number
     * @return PageResolverManagerInterface
     */
    public function getPage($number);
}