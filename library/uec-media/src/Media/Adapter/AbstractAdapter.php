<?php

namespace UEC\Media\Adapter;

use UEC\Media\MediaInterface;

abstract class AbstractAdapter implements AdapterInterface
{
    protected $object;
    protected $media;

    function __construct($object)
    {
        if (!$object instanceof MediaInterface && !$object instanceof AdapterInterface) {
            throw new \UnexpectedValueException('The adapter can be receive instance of MediaInterface or AdapterInterface');
        }

        $this->object = $object;

        if ($object instanceof AdapterInterface) {
            $this->media = $object->getMedia();
        } else {
            $this->media = $object;
        }
    }

    public function getMedia()
    {
        return $this->media;
    }

    public function getReader()
    {
        return $this->media->getReader();
    }

    public function getUri()
    {
        return $this->media->getReader()->getUri();
    }

    function __call($name, $arguments)
    {
        return call_user_func_array(array($this->object, $name), $arguments);
    }
}