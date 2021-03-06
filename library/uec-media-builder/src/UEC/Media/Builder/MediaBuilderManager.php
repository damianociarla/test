<?php

namespace UEC\Media\Builder;

use UEC\Media\Adapter\AdapterInterface;
use UEC\Media\Model\MediaInterface;

class MediaBuilderManager
{
    public static function createFromAdapter(AdapterInterface $adapter, MediaBuilderInterface $mediaBuilderAdapter)
    {
        if (!$mediaBuilderAdapter->supports($adapter)) {
            throw new \UnexpectedValueException('Builder does not support the adapter');
        }

        $className = $mediaBuilderAdapter->getClassName();
        $media = new $className();

        if (!$media instanceof MediaInterface) {
            throw new \UnexpectedValueException('Class must be an instance of MediaInterface');
        }

        $media->setSource($adapter->getSource()->getSource());

        $paramBag = new ParamBag();
        $mediaBuilderAdapter->build($paramBag, $adapter);

        foreach ($paramBag->getProperties() as $mediaField => $value) {
            $mediaSetterMethod = 'set'.ucfirst($mediaField);

            if (!is_callable(array($media, $mediaSetterMethod), true, $callableName)) {
                throw new \BadMethodCallException(sprintf('Method "%s" is not callable', $callableName));
            }

            call_user_func_array(array($media, $mediaSetterMethod), array($value));
        }

        return $media;
    }
}