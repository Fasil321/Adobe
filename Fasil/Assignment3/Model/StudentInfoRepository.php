<?php
namespace Fasil\Assignment3\Model;

use Fasil\Assignment3\Api\Data\StudentInfoInterface;
use Fasil\Assignment3\Api\StudentInfoRepositoryInterface;
use Fasil\Assignment3\Model\StudentInfoFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\App\ResourceConnection;
use Fasil\Assignment3\Api\Data\StudentInfoInterfaceFactory;
use Fasil\Assignment3\Model\ResourceModel\StudentInfo\CollectionFactory;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;


class StudentInfoRepository implements StudentInfoRepositoryInterface
{
    /**
     * @var \Fasil\Assignment3\Model\StudentInfoFactory
     */
    private \Fasil\Assignment3\Model\StudentInfoFactory $studentInfoFactory;

    /**
     * @param \Fasil\Assignment3\Model\StudentInfoFactory $studentInfoFactory
     */
    public function __construct(StudentInfoFactory $studentInfoFactory, ResourceConnection $resourceConnection,
        StudentInfoInterfaceFactory $studentInfo,CollectionFactory $studentCollectionFactory,
        JoinProcessorInterface $extensionAttributesJoinProcessor, CollectionProcessorInterface $collectionProcessor)
    {
        $this->studentInfoFactory = $studentInfoFactory;
        $this->resourceConnection = $resourceConnection;
        $this->studentInfo = $studentInfo;
        $this->studentCollectionFactory = $studentCollectionFactory;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * Return collection by id
     *
     * @param int $id
     * @return StudentInfoInterface
     */
    public function getById($id)
    {
        // $student = $this->studentInfoFactory->create();
        // return $student->load($id, 'entity_id')->getEmail();


        $studentModel = $this->studentInfoFactory->create()->load($id);
        $studentData = $this->studentInfo->create();
        $studentData->setId($studentModel->getId());
        $studentData->setName($studentModel->getName());
        $studentData->setEmail($studentModel->getEmail());
        $studentData->setRegistrationNo($studentModel->getRegistrationNo());
        $studentData->setDob($studentModel->getDob());
        $studentData->setAddress($studentModel->getAddress());
        $studentData->setEnabled($studentModel->getEnabled());
        return $studentData;

    }

    /**
     * @param int $limit
     * @return array
     */
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

    /**
     * @param int $id
     * @return array
     */
    public function getStudentWithGrade($id)
    {
        $connection = $this->resourceConnection->getConnection();
        $mainTable = 'student_info';
        $gradeTable = 'student_grade';
        $join = $connection->select()->from(['mainTable'=>$mainTable])->join(['gradeTable'=>$gradeTable],'mainTable.entity_id=gradeTable.student_id')->where('mainTable.entity_id=?',$id);
        return $connection->fetchAll($join);
    }

}
