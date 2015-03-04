<?php

namespace UEC\MediaUploader\Core\Uploader\Adapter;

use UEC\MediaUploader\Core\Uploader\AbstractUploadAdapter;

class RemoteFile extends AbstractUploadAdapter implements RemoteFileInterface
{
    private $path;
    private $error;

    function __construct($path)
    {
        $this->path = $path;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getName()
    {
        return pathinfo(parse_url($this->path, PHP_URL_PATH), PATHINFO_BASENAME);
    }

    public function getSize()
    {
        $result = -1;

        $curl = curl_init($this->path);

        curl_setopt($curl, CURLOPT_NOBODY, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

        $data = curl_exec($curl);
        curl_close($curl);

        if ($data) {
            $contentLength = 'unknown';
            $status = 'unknown';

            if (preg_match('/^HTTP\/1\.[01] (\d\d\d)/', $data, $matches)) {
                $status = (int)$matches[1];
            }

            if (preg_match('/Content-Length: (\d+)/', $data, $matches)) {
                $contentLength = (int)$matches[1];
            }

            if ($status == 200 || ($status > 300 && $status <= 308)) {
                $result = $contentLength;
            }
        }

        return $result;
    }

    public function hasError()
    {
        $headers = @get_headers($this->path);

        if ($headers[0] == 'HTTP/1.1 404 Not Found') {
            $this->error = 'File not found';
            return true;
        }

        return false;
    }

    public function getError()
    {
        return $this->error;
    }

    public function isLocal()
    {
        return false;
    }
}