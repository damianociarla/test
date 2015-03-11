<?php

namespace UEC\Media\Reader;

use UEC\Media\RemoteUriInterface;

class RemoteReader extends AbstractReader implements RemoteReaderInterface
{
    private $contentType;

    public function supports()
    {
        return $this->uri instanceof RemoteUriInterface;
    }

    public function read()
    {
        $headers = get_headers($this->uri->getValue(), 1);

        $this->contentType = $headers['Content-Type'];
    }

    public function getContentType()
    {
        return $this->contentType;
    }
}