<?php

namespace UEC\Media\Adapter\Common;

class RemoteReader extends AbstractReader implements ReaderInterface
{
    private $uri;
    private $error;

    public function isValid()
    {
        return (file_exists($this->uri) && is_readable($this->uri));
    }
}