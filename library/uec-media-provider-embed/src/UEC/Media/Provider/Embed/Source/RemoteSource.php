<?php

namespace UEC\Media\Provider\Embed\Source;

use UEC\Media\Source\AbstractSource;

class RemoteSource extends AbstractSource implements RemoteSourceInterface
{
    public function getContent()
    {
        return $this->source;
    }
}