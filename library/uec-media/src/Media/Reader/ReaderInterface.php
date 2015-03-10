<?php

namespace UEC\Media\Reader;

interface ReaderInterface
{
    public function isValid();
    public function getUri();
    public function getError();
}
