<?php

namespace UEC\Media\Builder;

interface MediaBuilderInterface
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
     * @return MediaBuilderInterface
     */
    public function add($field, $value);
}