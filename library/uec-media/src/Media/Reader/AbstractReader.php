<?php

namespace UEC\Media\Reader;

abstract class AbstractReader
{
    protected $uri;
    protected $error;
    protected $plugins;

    public function __construct($uri)
    {
        $this->uri = $uri;
        $this->plugins = array();
    }

    public function setUri($uri)
    {
        $this->uri = $uri;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function getError()
    {
        return $this->error;
    }

    public function addPlugin($plugin)
    {
        $plugin->setReader($this);
        $capability = $plugin->getCapability();
        $this->plugins[$capability] = $plugin;
    }

    public function canDo($capability)
    {
        return array_key_exists($capability, $this->plugins);
    }
}
