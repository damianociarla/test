<?php

namespace UEC\Media\Adapter;

use UEC\Media\MediaInterface;
use UEC\Media\Source\SourceInterface;

interface AdapterInterface
{
    /**
     * Get source
     *
     * @return SourceInterface
     */
    public function getSource();
}