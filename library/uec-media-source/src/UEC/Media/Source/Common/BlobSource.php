<?php

namespace UEC\Media\Source\Common;

use UEC\Media\Source\AbstractSource;

class BlobSource extends AbstractSource implements BlobSourceInterface
{
    public function getContent()
    {
        return $this->source;
    }
}