<?php

namespace UEC\Media\Builder;

interface MediaBuilderInterface
{
    /**
     * Get className
     *
     * @return mixed
     */
    public function getClassName();

    /**
     * Set className
     *
     * @param mixed $className
     * @return MediaBuilderInterface
     */
    public function setClassName($className);

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
     * @param string $method
     * @param array $params
     * @return MediaBuilderInterface
     */
    public function add($field, $method, array $params = array());
}