<?php
namespace Fasil\Assignment3\Model;

use Fasil\Assignment3\Api\StudentInfoRepositoryInterface;
use Fasil\Assignment3\Model\StudentInfoFactory;
use Magento\Framework\App\ResourceConnection;

class StudentInfoRepository implements StudentInfoRepositoryInterface
{
    /**
     * @var \Fasil\Assignment3\Model\StudentInfoFactory
     */
    private \Fasil\Assignment3\Model\StudentInfoFactory $studentInfoFactory;

    /**
     * @param \Fasil\Assignment3\Model\StudentInfoFactory $studentInfoFactory
     */
    public function __construct(StudentInfoFactory $studentInfoFactory, ResourceConnection $resourceConnection)
    {
        $this->studentInfoFactory = $studentInfoFactory;
        $this->resourceConnection = $resourceConnection;
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

    public function getDetails($limit)
    {
    	$collection = [];
        for($i=1;$i<=$limit;$i++){
        	$student = $this->studentInfoFactory->create();
        	$data = $student->load($i);
	        $collection[] = $data->getData();
        }
        return $collection;
    }

    public function getStudentWithGrade($id)
    {
        $connection = $this->resourceConnection->getConnection();
        $mainTable = 'student_info';
        $gradeTable = 'student_grade';
        $join = $connection->select()->from(['mainTable'=>$mainTable])->join(['gradeTable'=>$gradeTable],'mainTable.entity_id=gradeTable.student_id')->where('mainTable.entity_id=?',$id);
        return $connection->fetchAll($join);
    }
}
