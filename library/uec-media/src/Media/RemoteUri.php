<?php

namespace UEC\Media;

class RemoteUri extends Uri implements RemoteUriInterface
{
    public function getHttpStatusCode()
    {
        $headers = get_headers($this->value);
        return substr($headers[0], 9, 3);
    }

    public function isValid()
    {
        return false !== filter_var($this->value, FILTER_VALIDATE_URL);
    }
}