<?php

namespace UEC\Media\Adapter;

use UEC\Media\Source\SourceInterface;

abstract class AbstractAdapter implements AdapterInterface
{
    protected $source;

    function __construct(SourceInterface $source)
    {
        if (!$this->supports($source)) {
            throw new \UnexpectedValueException('Source type is not valid');
        }

        $this->source = $source;
    }

    public function getSource()
    {
        return $this->source;
    }

    abstract protected function supports(SourceInterface $source);
}