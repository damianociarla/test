<?php

use League\CLImate\CLImate;
use UEC\Media\Destination\Console\ConsoleShowerInterface;

class CLIMateShower implements ConsoleShowerInterface
{
    private $climate;

    function __construct(CLImate $climate)
    {
        $this->climate = $climate;
    }

    public function writeString($data)
    {
        $this->climate->out($data);
    }

    public function writeArray(array $data)
    {
        $this->climate->json($data);
    }
}