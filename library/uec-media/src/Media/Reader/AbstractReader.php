<?php

namespace UEC\Media\Reader;

use UEC\Media\Reader\Plugin\ReaderPluginInterface;

abstract class AbstractReader
{
    protected $uri;
    protected $error;
    protected $plugins;

    /** @var ReaderPluginManager */
    protected $pluginManager;

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

    public function setPluginManager(ReaderPluginManager $pluginManager)
    {
        $this->pluginManager = $pluginManager;
    }

    /**
     * @return ReaderPluginManager
     */
    public function getPluginManager()
    {
        return $this->pluginManager;
    }

    public function has($name)
    {
        return $this->pluginManager->has($name);
    }

    public function __call($name, $params = null)
    {
        if ($this->has($name)) {
            /** @var ReaderPluginInterface $plugin */
            $plugin = $this->pluginManager->get($name, $params);

            if (is_callable($plugin)) {
                return call_user_func_array($plugin, $params);
            }

            return $plugin;
        }

        return null;
    }
}
