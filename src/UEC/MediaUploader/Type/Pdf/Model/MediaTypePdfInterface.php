<?php

namespace UEC\MediaUploader\Type\Pdf\Model;

use UEC\MediaUploader\Type\Pdf\Resolver\PageResolverInterface;
use UEC\MediaUploader\Type\Pdf\Resolver\PageResolverManagerConfigurationInterface;
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

    /**
     * Set pageResolver
     *
     * @param PageResolverManagerConfigurationInterface $pageResolverManager
     * @return MediaTypePdf
     */
    public function setPageResolverManager(PageResolverManagerConfigurationInterface $pageResolverManager);

    /**
     * Add resolver to PageResolverManager
     *
     * @param PageResolverInterface $resolver
     * @return MediaTypePdf
     */
    public function addPageResolver(PageResolverInterface $resolver);
}