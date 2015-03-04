<?php

namespace UEC\MediaUploader\Core;

use UEC\MediaUploader\Core\Adapter\AdapterInterface;
use UEC\MediaUploader\Core\Model\MediaInterface;

interface MediaManagerInterface
{
    /**
     * @param string $context
     * @param AdapterInterface $adapter
     * @return MediaInterface
     */
    public function save($context, AdapterInterface $adapter);
}