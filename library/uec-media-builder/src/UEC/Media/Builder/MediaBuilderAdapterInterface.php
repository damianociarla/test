<?php

namespace UEC\Media\Builder;

use UEC\Media\Adapter\AdapterInterface;

interface MediaBuilderAdapterInterface
{
    /**
     * Check if builder supports the adapter
     *
     * @param AdapterInterface $adapter
     * @return boolean
     */
    public function supports(AdapterInterface $adapter);

    /**
     * Get className
     *
     * @return mixed
     */
    public function getClassName();

    /**
     * Build media
     *
     * @param MediaBuilderInterface $mediaBuilder
     * @param AdapterInterface $adapter
     */
    public function build(MediaBuilderInterface $mediaBuilder, AdapterInterface $adapter);
}