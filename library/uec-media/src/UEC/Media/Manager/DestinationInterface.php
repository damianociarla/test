<?php

namespace UEC\Media\Manager;

interface DestinationInterface
{
    /**
     * Perform the save destination
     *
     * @param $filterResponse
     */
    public function save($filterResponse);
}