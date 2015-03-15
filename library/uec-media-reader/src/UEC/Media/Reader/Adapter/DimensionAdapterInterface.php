<?php

namespace UEC\Media\Reader\Adapter;

interface DimensionAdapterInterface extends AdapterInterface
{
    /**
     * Get array dimension
     *
     * @param string $type width|height
     * @return array
     */
    public function getDimension($type);

    /**
     * Get width
     *
     * @return int
     */
    public function getWidth();

    /**
     * Get height
     *
     * @return int
     */
    public function getHeight();
}