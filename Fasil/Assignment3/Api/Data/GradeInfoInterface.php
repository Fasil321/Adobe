<?php

namespace Fasil\Assignment3\Api\Data;

interface GradeInfoInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return void
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getStudentId();

    /**
     * @param int $studentId
     * @return void
     */
    public function setStudentId($studentId);

    /**
     * @return string
     */
    public function getGrade();

    /**
     * @param string $grade
     * @return void
     */
    public function setGrade($grade);
}
