<?php

namespace UEC\Media\Adapter;

use UEC\Media\MediaInterface;

interface AdapterInterface
{
    public function setSource($source);
    public function getSource();

    /**
     * @return array
     */
    public function extract();
}