<?php

namespace UEC\Media\Reader;

use UEC\Media\Adapter\AdapterInterface;

class Reader implements ReaderInterface
{
    protected $source;
    protected $adapter;

    public function __construct($source, AdapterInterface $adapter)
    {
        $this->source = $source;
        $this->adapter = $adapter;
        $this->adapter->setSource($source);
    }

    public function getAdapter()
    {
        return $this->adapter;
    }

    public function extract()
    {
        return $this->adapter->extract();
    }
}
