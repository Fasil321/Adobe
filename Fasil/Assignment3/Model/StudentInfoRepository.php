<?php

namespace Fasil\Assignment3\Model;
use Fasil\Assignment3\Api\StudentInfoRepositoryInterface;
use Fasil\Assignment3\Model\StudentInfoFactory;
class StudentInfoRepository implements StudentInfoRepositoryInterface
{
    private \Fasil\Assignment3\Model\StudentInfoFactory $studentInfoFactory;

    /**
     * @param \Fasil\Assignment3\Model\StudentInfoFactory $studentInfoFactory
     */
    public function __construct(StudentInfoFactory $studentInfoFactory)
    {
    	$this->studentInfoFactory = $studentInfoFactory;
    }

    /**
     * Return collection by id
     *
     * @param $id
     * @return StudentInfo
     */
    public function getById($id)
    {
    	$student = $this->studentInfoFactory->create();
    	return $student->load($id, 'entity_id');
    }
}
