<?php

namespace UEC\Media\Source\Common;

use UEC\Media\Source\AbstractSource;

class ContentSource extends AbstractSource
{
    public function getContent()
    {
        return file_get_contents($this->source);
    }
}