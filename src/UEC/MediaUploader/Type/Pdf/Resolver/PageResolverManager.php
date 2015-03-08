<?php

namespace UEC\MediaUploader\Type\Pdf\Resolver;

use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfInterface;

class PageResolverManager implements PageResolverManagerConfigurationInterface, PageResolverManagerInterface
{
    private $mediaPdf;
    private $pageNumber;

    /**
     * @var PageResolverInterface
     */
    private $imageResolver;

    function __construct(MediaTypePdfInterface $mediaPdf = null)
    {
        $this->mediaPdf = $mediaPdf;
    }

    public function setMediaPdf(MediaTypePdfInterface $mediaPdf)
    {
        $this->mediaPdf = $mediaPdf;
        return $this;
    }

    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;
        return $this;
    }

    public function addResolver(PageResolverInterface $resolver)
    {
        if ($resolver instanceof PageImageResolverInterface) {
            $this->imageResolver = $resolver;
        }
    }

    public function image()
    {
        return $this->imageResolver->getPage($this->mediaPdf, $this->pageNumber)->getMedia();
    }
}