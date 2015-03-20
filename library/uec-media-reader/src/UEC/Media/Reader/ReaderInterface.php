<?php

namespace UEC\Media\Reader;

use UEC\Media\Adapter\AdapterInterface;

interface ReaderInterface
{
    public function __construct($source, AdapterInterface $adapter);
    public function getAdapter();
    public function extract();
}
