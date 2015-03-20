<?php

namespace UEC\Media\Manager;

use UEC\Media\Model\MediaInterface;
use UEC\Media\Reader\ReaderInterface;

interface DestinationInterface
{
    public function save($result);
}