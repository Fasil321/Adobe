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
use Fasil\Assignment3\Api\Data\StudentInfoSearchResultsInterfaceFactory;
use Fasil\Assignment3\Model\ResourceModel\StudentInfo as ResourceModel;

class StudentInfoRepository implements StudentInfoRepositoryInterface
{
    /**
     * @var \Fasil\Assignment3\Model\StudentInfoFactory
     */
    private \Fasil\Assignment3\Model\StudentInfoFactory $studentInfoFactory;

    /**
     * @var ResourceConnection
     */
    private ResourceConnection $resourceConnection;

    /**
     * @var StudentInfoInterfaceFactory
     */
    private StudentInfoInterfaceFactory $studentInfo;

    /**
     * @var JoinProcessorInterface
     */
    private JoinProcessorInterface $extensionAttributesJoinProcessor;

    /**
     * @var CollectionFactory
     */
    private CollectionFactory $studentCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessorInterface;

    /**
     * @var StudentInfoSearchResultsInterfaceFactory
     */
    private StudentInfoSearchResultsInterfaceFactory $searchResultsFactory;

    /**
     * @var ResourceModel
     */
    private ResourceModel $resourceModel;

    /**
     * Constructor
     *
     * @param \Fasil\Assignment3\Model\StudentInfoFactory $studentInfoFactory
     * @param ResourceConnection $resourceConnection
     * @param StudentInfoInterfaceFactory $studentInfo
     * @param CollectionFactory $studentCollectionFactory
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param CollectionProcessorInterface $collectionProcessor
     * @param CollectionProcessorInterface $collectionProcessorInterface
     * @param StudentInfoSearchResultsInterfaceFactory $searchResultsFactory
     * @param ResourceModel $resourceModel
     */
    public function __construct(
        StudentInfoFactory $studentInfoFactory,
        ResourceConnection $resourceConnection,
        StudentInfoInterfaceFactory $studentInfo,
        CollectionFactory $studentCollectionFactory,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        CollectionProcessorInterface $collectionProcessor,
        CollectionProcessorInterface $collectionProcessorInterface,
        StudentInfoSearchResultsInterfaceFactory $searchResultsFactory,
        ResourceModel $resourceModel
    ) {
        $this->studentInfoFactory = $studentInfoFactory;
        $this->resourceConnection = $resourceConnection;
        $this->studentInfo = $studentInfo;
        $this->studentCollectionFactory = $studentCollectionFactory;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessorInterface = $collectionProcessorInterface;
        $this->resourceModel = $resourceModel;
    }

    /**
     * Return collection by id
     *
     * @param int $id
     * @return StudentInfoInterface
     */
    public function getById($id)
    {
         $student = $this->studentInfoFactory->create();
         return $student->load($id, 'entity_id');
    }

    /**
     * @inheritDoc
     */
    public function getStudentData($id)
    {
        $gradeModel = $this->studentCollectionFactory->create();
        $gradeModel->addFieldToFilter('entity_id', ['eq'=>$id]);
        return $gradeModel->getData();
    }

    /**
     * @inheritDoc
     */
    public function getDetails($limit)
    {
        $collection = [];
        for ($i=1; $i<=$limit; $i++) {
            $student = $this->studentInfoFactory->create();
            $data = $student->load($i);
            $collection[] = $data->getData();
        }
        return $collection;
    }

    /**
     * @inheritDoc
     */
    public function getStudentWithGrade($id)
    {
        $connection = $this->resourceConnection->getConnection();
        $mainTable = 'student_info';
        $gradeTable = 'student_grade';
        $join = $connection->select()->from(['mainTable'=>$mainTable])
            ->join(['gradeTable'=>$gradeTable], 'mainTable.entity_id=gradeTable.student_id')
            ->where('mainTable.entity_id=?', $id);
        return $connection->fetchAll($join);
    }

    /**
     * @inheritdoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $studentData = $this->studentCollectionFactory->create();
        $this->collectionProcessorInterface->process($searchCriteria, ($studentData));
        $searchData = $this->searchResultsFactory->create();
        $searchData->setSearchCriteria($searchCriteria);
        $searchData->setItems($studentData->getItems());
        $searchData->setTotalCount($studentData->getSize());
        $searchData->setSearchCriteria($searchCriteria);
        return $searchData;
    }

    /**
     * @inheritdoc
     */
    public function save($data)
    {
        return $this->resourceModel->save($data);
    }

    /**
     * @inheritdoc
     */
    public function delete($id)
    {
        $student = $this->studentInfoFactory->create()->load($id);
        return $this->resourceModel->delete($student);
    }
}
