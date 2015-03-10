<?php

namespace UEC\Media\Reader;

class RemoteReader extends AbstractReader implements ReaderInterface
{
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
