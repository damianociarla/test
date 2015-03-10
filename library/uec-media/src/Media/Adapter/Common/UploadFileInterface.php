<?php

namespace UEC\Media\Adapter\Common;

use UEC\Media\Adapter\AdapterStreamInterface;

interface UploadFileInterface extends AdapterStreamInterface
{
    /**
     * Get file
     *
     * @return array
     */
    public function getFile();
}