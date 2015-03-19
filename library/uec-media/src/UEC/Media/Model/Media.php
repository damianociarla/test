<?php

namespace UEC\Media\Model;

use UEC\Media\Adapter\AdapterInterface;

class Media implements MediaInterface
{
    /**
     * @var string
     */
    protected $source;

    /**
     * @var AdapterInterface
     */
    protected $provider;

    public function getSource()
    {
        return $this->source;
    }

    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    public function setProvider(AdapterInterface $provider)
    {
        $this->provider = $provider;
        return $this;
    }

    public function getProvider()
    {
        return $this->provider;
    }
}
