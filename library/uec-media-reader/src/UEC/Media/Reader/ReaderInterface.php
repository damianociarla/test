<?php

namespace UEC\Media\Reader;

use UEC\Media\Adapter\AdapterInterface;

interface ReaderInterface
{
    public function __construct($source, AdapterInterface $adapter);
    public function getAdapter();

    /**
     * Get source
     *
     * @return mixed
     */
    public function getSource();

    public function extract();
}
