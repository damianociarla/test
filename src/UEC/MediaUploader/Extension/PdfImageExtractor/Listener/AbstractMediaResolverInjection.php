<?php

namespace UEC\MediaUploader\Extension\PdfImageExtractor\Listener;

use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfInterface;
use UEC\MediaUploader\Type\Pdf\Resolver\PageImageResolverInterface;

abstract class AbstractMediaResolverInjection
{
    protected $pageImageResolver;

    function __construct(PageImageResolverInterface $pageImageResolver)
    {
        $this->pageImageResolver = $pageImageResolver;
    }

    public function injectPageResolverOnLoadOnLoad(MediaTypePdfInterface $mediaPdf)
    {
        $mediaPdf->addPageResolver($this->pageImageResolver);
    }
}