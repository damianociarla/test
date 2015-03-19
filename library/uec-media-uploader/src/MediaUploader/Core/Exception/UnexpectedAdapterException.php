<?php

namespace UEC\MediaUploader\Core\Exception;

use Exception;
use UEC\MediaUploader\Core\Adapter\AdapterInterface;

class UnexpectedAdapterException extends \UnexpectedValueException
{
    public function __construct(AdapterInterface $adapter, array $adaptersSupported, $code = 0, Exception $previous = null)
    {
        $message = sprintf('The "%s" adapter is not accepted. Have accepted the following adapter: [%s]', get_class($adapter), implode(',', $adaptersSupported));
        parent::__construct($message, $code, $previous);
    }
}