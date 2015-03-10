<?php

namespace UEC\Media;

interface MediaInterface
{
    /**
     * Get path
     *
     * @return mixed
     */
    public function getPath();

    /**
     * Get adapterReader
     *
     * @return AdapterInterface
     */
    public function getAdapterReader();
}