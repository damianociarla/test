<?php

namespace UEC\Media\Destination\Console;

use UEC\Media\Manager\DestinationInterface;

class ConsoleDestination implements DestinationInterface
{
    private $consoleShowerInterface;

    function __construct(ConsoleShowerInterface $consoleShowerInterface)
    {
        $this->consoleShowerInterface = $consoleShowerInterface;
    }

    public function save($filterResponse)
    {
        if (is_array($filterResponse)) {
            $this->consoleShowerInterface->writeArray($filterResponse);
        }

        if (is_string($filterResponse)) {
            $this->consoleShowerInterface->writeString($filterResponse);
        }
    }
}