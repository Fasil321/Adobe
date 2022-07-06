<?php

namespace Fasil\Assignment3\Api;

interface StudentInfoRepositoryInterface
{
    /**
     * Return collection by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id);
}
