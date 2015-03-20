<?php

namespace UEC\Media\Reader\Adapter;

use UEC\Media\MediaInterface;

interface AdapterInterface
{
    /**
     * @param mixed $source
     * @return array
     */
    public function extract($source);
}