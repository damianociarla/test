<?php

namespace UEC\Media\Source\Common;

use UEC\Media\Source\AbstractSource;

class UploadSource extends AbstractSource
{
    public function getContent()
    {
        return $this->source['tmp_name'];
    }
}