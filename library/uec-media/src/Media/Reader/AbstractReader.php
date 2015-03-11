<?php

namespace UEC\Media\Reader;

use UEC\Media\UriInterface;

abstract class AbstractReader implements ReaderInterface
{
    protected $uri;

    function __construct(UriInterface $uri)
    {
        $this->uri = $uri;

        if ($uri->isValid()) {
            if (!$this->supports()) {
                throw new \UnexpectedValueException('The reader can not read the uri');
            }
            $this->read();
        }
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function supports()
    {
        return true;
    }
}