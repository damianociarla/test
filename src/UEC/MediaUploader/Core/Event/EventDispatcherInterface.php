<?php

namespace UEC\MediaUploader\Core\Event;

interface EventDispatcherInterface
{
    public function dispatch($eventName);
}