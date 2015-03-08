<?php

namespace UEC\MediaUploader\Type\Pdf\Model;

use UEC\MediaUploader\Core\Model\MediaType;
use UEC\MediaUploader\Type\Pdf\Resolver\PageResolver;
use UEC\MediaUploader\Type\Pdf\Resolver\PageResolverInterface;
use UEC\MediaUploader\Type\Pdf\Resolver\PageResolverManager;
use UEC\MediaUploader\Type\Pdf\Resolver\PageResolverManagerConfigurationInterface;
use UEC\MediaUploader\Type\Pdf\Resolver\PageResolverManagerInterface;

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
     * @var PageResolverManagerInterface
     */
    protected $pageResolverManager;

    function __construct()
    {
        $this->pageResolverManager = new PageResolverManager($this);
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

    public function setPageResolverManager(PageResolverManagerConfigurationInterface $pageResolverManager)
    {
        $pageResolverManager->setMediaPdf($this);
        $this->pageResolverManager = $pageResolverManager;
        return $this;
    }

    public function addPageResolver(PageResolverInterface $resolver)
    {
        $this->pageResolverManager->setMediaPdf($this)->addResolver($resolver);
        return $this;
    }

    public function getPage($number)
    {
        $this->pageResolverManager
            ->setMediaPdf($this)
            ->setPageNumber($number);

        return $this->pageResolverManager;
    }
}