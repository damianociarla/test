<?php

namespace UEC\MediaUploader\Core\Factory;

use UEC\MediaUploader\Core\Model\MediaInterface;

class ContextConfigurationFactory
{
    public function __invoke(array $contextConfiguration)
    {
        return new ContextConfiguration($contextConfiguration);
    }
}