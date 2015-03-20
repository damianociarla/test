<?php

namespace UEC\Media\Builder;

use UEC\Media\Adapter\AdapterInterface;
use UEC\Media\Reader\ReaderInterface;

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
     * @param ReaderInterface $reader
     */
    public function build(ParamBagInterface $paramBag, ReaderInterface $reader);
}