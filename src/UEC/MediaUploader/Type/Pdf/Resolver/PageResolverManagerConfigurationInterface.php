<?php

namespace UEC\MediaUploader\Type\Pdf\Resolver;

interface PageResolverManagerConfigurationInterface
{
    /**
     * Add resolver to setting
     *
     * @param PageResolverInterface $resolver
     */
    public function addResolver(PageResolverInterface $resolver);
}