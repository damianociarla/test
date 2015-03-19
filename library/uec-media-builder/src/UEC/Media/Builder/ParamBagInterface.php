<?php

namespace UEC\Media\Builder;

interface ParamBagInterface
{
    /**
     * Get properties
     *
     * @return mixed
     */
    public function getProperties();

    /**
     * Set properties
     *
     * @param string $field
     * @param mixed $value
     * @return ParamBagInterface
     */
    public function add($field, $value);
}