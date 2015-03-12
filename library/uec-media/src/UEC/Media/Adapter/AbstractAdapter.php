<?php

namespace UEC\Media\Adapter;

use UEC\Media\Builder\MediaBuilderInterface;
use UEC\Media\MediaInterface;
use UEC\Media\Reader\ReaderInterface;

abstract class AbstractAdapter implements AdapterInterface
{
    protected $reader;

    function __construct(ReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function getReader()
    {
        return $this->reader;
    }

    public function buildMedia(MediaBuilderInterface $builder)
    {
        $builder->setClassName('UEC\Media\Model\Media');
    }
}