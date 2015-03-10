<?php

namespace UEC\Media\Reader;

use Zend\ServiceManager\Exception;

class ReaderPluginManager extends \Zend\ServiceManager\AbstractPluginManager
{
    /**
     * Validate the plugin
     *
     * Checks that the filter loaded is either a valid callback or an instance
     * of FilterInterface.
     *
     * @param  mixed $plugin
     * @return void
     * @throws Exception\RuntimeException if invalid
     */
    public function validatePlugin($plugin)
    {
        if ($plugin instanceof Plugin\ReaderPluginInterface) {
            return;
        }

        throw new \InvalidArgumentException(sprintf(
            'Plugin of type %s is invalid; must implement %s\Plugin\ReaderPluginInterface',
            (is_object($plugin) ? get_class($plugin) : gettype($plugin)),
            __NAMESPACE__
        ));
    }

}