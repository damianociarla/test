<?php

namespace UEC\Media\Builder;

use UEC\Media\Adapter\AdapterInterface;

interface MediaBuilderInterface
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
     * @param ParamBagInterface $paramBag
     * @param AdapterInterface $adapter
     */
    public function build(ParamBagInterface $paramBag, AdapterInterface $adapter);
}