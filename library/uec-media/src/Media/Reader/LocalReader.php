<?php

namespace UEC\Media\Reader;

class RemoteReader extends AbstractReader implements ReaderInterface
{
    private $uri;
    private $error;

    public function isValid()
    {
        return (file_exists($this->uri) && is_readable($this->uri));
    }
}