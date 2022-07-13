<?php

namespace Fasil\Assignment3\Api;

use Fasil\Assignment3\Api\Data\StudentInfoInterface;

interface StudentInfoRepositoryInterface
{
    /**
     * Return collection by id
     *
     * @param int $id
     * @return StudentInfoInterface
     */
    public function getById($id);

    /**
     * @param int $limit
     * @return StudentInfoInterface
     */
    public function getDetails($limit);

    /**
     * @param int $id
     * @return StudentInfoInterface
     */
    public function getStudentWithGrade($id);

}
