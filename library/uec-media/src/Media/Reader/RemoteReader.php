<?php

namespace UEC\Media\Adapter\Common;

class RemoteReader extends AbstractReader implements ReaderInterface
{
    private $uri;
    private $error;

    public function isValid()
    {
        $headers = @get_headers($this->uri);

        if ($headers[0] == 'HTTP/1.1 404 Not Found') {
            $this->error = 'File not found';
            return true;
        }

        return false;
    }
}