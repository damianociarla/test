<?php

namespace UEC\Media\Adapter;

class DimensionAdapter extends AbstractAdapter implements DimensionAdapterInterface
{
    const WIDTH  = 'width';
    const HEIGHT = 'height';

    private $dimension;

    public function getDimension($type)
    {
        if (null === $this->dimension) {
            list($width, $height) = getimagesize($this->getReader()->getUri());

            $this->dimension = array(
                self::WIDTH => $width,
                self::HEIGHT => $height,
            );
        }

        return $this->dimension[$type];
    }

    public function getWidth()
    {
        return $this->getDimension(self::WIDTH);
    }

    public function getHeight()
    {
        return $this->getDimension(self::HEIGHT);
    }
}