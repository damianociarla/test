<?php

namespace UEC\MediaUploader\Type\Pdf\Adapter\Validator;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;
use UEC\MediaUploader\Core\Adapter\Validator\AdapterValidatorInterface;

class PdfValidator implements AdapterValidatorInterface
{
    public function supports(AdapterInterface $adapter)
    {
        return true;
    }

    public function validate(AdapterInterface $adapter)
    {
        $contentType = null;

        if ($adapter->isLocal()) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $contentType = finfo_file($finfo, $adapter->getPath());
            finfo_close($finfo);
        } else {
            $headers = get_headers($adapter->getPath(), 1);
            $contentType = $headers['Content-Type'];
        }

        return (null !== $contentType && false !== strpos($contentType, 'pdf'));
    }
}