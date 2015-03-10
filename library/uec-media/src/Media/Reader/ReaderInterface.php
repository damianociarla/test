<?php

namespace UEC\Media\Reader;

interface ReaderInterface
{
    public function __construct($uri);
    public function isValid();
    public function getUri();
    public function getError();
}
