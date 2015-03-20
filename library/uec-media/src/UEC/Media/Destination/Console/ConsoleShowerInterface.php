<?php

namespace UEC\Media\Destination\Console;

interface ConsoleShowerInterface
{
    /**
     * @param string $data
     */
    public function writeString($data);

    /**
     * @param array $data
     */
    public function writeArray(array $data);
}