<?php

namespace UEC\MediaUploader\Type\Pdf\Model;

use UEC\MediaUploader\Core\Model\MediaType;
use UEC\MediaUploader\Type\Pdf\Resolver\PageResolver;
use UEC\MediaUploader\Type\Pdf\Resolver\PageResolverInterface;
use UEC\MediaUploader\Type\Pdf\Resolver\PageResolverManager;
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
    protected $pageResolver;

    function __construct()
    {
        $this->pageResolver = new PageResolverManager($this);
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

    public function getPage($number)
    {
        $this->pageResolver->setPageNumber($number);
        return $this->pageResolver;
    }

    public function addPageResolver(PageResolverInterface $resolver)
    {
        if (null === $this->pageResolver) {
            $this->pageResolver = new PageResolverManager($this);
        }

        return $this->pageResolver->addResolver($resolver);
    }
}