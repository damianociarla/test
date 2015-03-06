<?php

namespace UEC\MediaUploader\Core\Adapter\Common;

use UEC\MediaUploader\Core\Adapter\AbstractAdapter;

class UploadFile extends AbstractAdapter implements UploadFileInterface
{
    private $file;

    function __construct($path)
    {
        if (!isset($_FILES[$path])) {
            throw new \Exception(sprintf('File "%s" not found', $path));
        }

        $this->file = $_FILES[$path];
    }

    public function getFile()
    {
        return $this->file;
    }

    public function getName()
    {
        return $this->file['name'];
    }

    public function getSize()
    {
        return $this->file['size'];
    }

    public function getPath()
    {
        return $this->file['tmp_name'];
    }

    public function hasError()
    {
        return $this->file['error'] != UPLOAD_ERR_OK;
    }

    public function getError()
    {
        if (!$this->hasError()) {
            return null;
        }

        switch ($this->file['error']) {
            case UPLOAD_ERR_INI_SIZE:
                $message = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $message = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
                break;
            case UPLOAD_ERR_PARTIAL:
                $message = 'The uploaded file was only partially uploaded';
                break;
            case UPLOAD_ERR_NO_FILE:
                $message = 'No file was uploaded';
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $message = 'Missing a temporary folder';
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $message = 'Failed to write file to disk';
                break;
            case UPLOAD_ERR_EXTENSION:
                $message = 'File upload stopped by extension';
                break;
            default:
                $message = 'Unknown upload error';
                break;
        }

        return $message;
    }

    public function isLocal()
    {
        return true;
    }
}