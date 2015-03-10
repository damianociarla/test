<?php

namespace UEC\Media\Reader;

class LocalReader extends AbstractReader implements ReaderInterface
{
    public function isValid()
    {
        return (file_exists($this->uri) && is_readable($this->uri));
    }
}