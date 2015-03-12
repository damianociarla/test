<?php

namespace UEC\Media\Builder;

use UEC\Media\Adapter\AdapterInterface;
use UEC\Media\Model\MediaInterface;

class MediaBuilderManager
{
    public static function createFromAdapter(AdapterInterface $adapter)
    {
        $mediaBuilder = new MediaBuilder();
        $adapter->buildMedia($mediaBuilder);

        $className = $mediaBuilder->getClassName();
        $media = new $className();

        if (!$media instanceof MediaInterface) {
            throw new \UnexpectedValueException('Class must be an instance of MediaInterface');
        }

        $media->setUri($adapter->getReader()->getUri());

        foreach ($mediaBuilder->getProperties() as $mediaField => $properties) {
            $mediaSetterMethod = 'set'.ucfirst($mediaField);

            if (!is_callable(array($media, $mediaSetterMethod), true, $callableName)) {
                throw new \BadMethodCallException(sprintf('Method "%s" is not callable', $callableName));
            }

            call_user_func_array(array($media, $mediaSetterMethod), array(call_user_func_array(array($adapter, $properties['method']), $properties['params'])));
        }

        return $media;
    }
}