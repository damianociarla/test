<?php

namespace UEC\Media;

use UEC\Media\Reader\ReaderInterface;

class Media implements MediaInterface
{
    private $reader;
    private $isValid;

    function __construct(ReaderInterface $reader)
    {
        $this->reader = $reader;
        $this->isValid = $reader->getUri()->isValid();
    }

    public function getReader()
    {
        return $this->reader;
    }

    public function isValid()
    {
        return $this->isValid;
    }

    public function setIsValid($isValid)
    {
        $this->isValid = $isValid;
        return $this;
    }
}