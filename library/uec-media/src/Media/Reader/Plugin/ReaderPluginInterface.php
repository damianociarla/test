<?php

namespace UEC\Media\Reader\Plugin;

use UEC\Media\Reader\ReaderInterface;

interface ReaderPluginInterface
{
    public function setReader(ReaderInterface $reader);
    public function getReader();
    public function __invoke();
}