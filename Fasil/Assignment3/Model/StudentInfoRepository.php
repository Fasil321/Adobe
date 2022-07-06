<?php
namespace Fasil\Assignment3\Model;

use Fasil\Assignment3\Api\StudentInfoRepositoryInterface;
use Fasil\Assignment3\Model\StudentInfoFactory;

class StudentInfoRepository implements StudentInfoRepositoryInterface
{
    /**
     * @var \Fasil\Assignment3\Model\StudentInfoFactory
     */
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
     * @param int $id
     * @return StudentInfo
     */
    public function getById($id)
    {
        $student = $this->studentInfoFactory->create();
        return $student->load($id, 'entity_id');
    }
}
