<?php

namespace UEC\MediaUploader\Core\Repository;

interface MediaObjectRepositoryInterface
{
    /**
     * Find set of objects by criteria
     *
     * @param array $criteria
     * @return array
     */
    public function findBy(array $criteria);

    /**
     * Find object by criteria
     *
     * @param array $criteria
     * @return mixed
     */
    public function findOneBy(array $criteria);

    /**
     * Find object by identifier
     *
     * @param $id
     * @return mixed
     */
    public function findById($id);
}