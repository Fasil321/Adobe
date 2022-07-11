<?php

namespace Fasil\Assignment3\Api;

interface StudentInfoRepositoryInterface
{
    /**
     * Return collection by id
     *
     * @param int $id
     * @return mixed
     */
    public function getById($id);

    public function getDetails($limit);

    public function getStudentWithGrade($id);
}
