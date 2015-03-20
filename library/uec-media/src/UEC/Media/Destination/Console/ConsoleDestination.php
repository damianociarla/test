<?php

namespace UEC\Media\Destination\Console;

use UEC\Media\Manager\DestinationInterface;

class ConsoleDestination implements DestinationInterface
{
    public function save($result)
    {
        var_dump($result);
    }
}