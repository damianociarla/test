<?php

namespace UEC\MediaUploader\Type\Pdf\Resolver;

use UEC\MediaUploader\Type\Pdf\Model\MediaTypePdfInterface;

interface PageResolverManagerConfigurationInterface
{
    /**
     * Add resolver to setting
     *
     * @param PageResolverInterface $resolver
     */
    public function addResolver(PageResolverInterface $resolver);

    /**
     * Set mediaPdf
     *
     * @param mixed $mediaPdf
     * @return PageResolverManagerConfigurationInterface
     */
    public function setMediaPdf(MediaTypePdfInterface $mediaPdf);
}