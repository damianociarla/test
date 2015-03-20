<?php

namespace UEC\Media\Model;

use UEC\Media\Reader\Adapter\AdapterInterface;

interface MediaInterface
{
    /**
     * Get source
     *
     * @return string
     */
    public function getSource();

    /**
     * Set source
     *
     * @param string $source
     * @return MediaInterface
     */
    public function setSource($source);

    /**
     * @param AdapterInterface $provider
     * @return MediaInterface
     */
    public function setProvider(AdapterInterface $provider);

    /**
     * @return AdapterInterface
     */
    public function getProvider();
}