<?php

namespace Fasil\Assignment3\Model;

use Fasil\Assignment3\Api\Data\GradeInfoInterfaceFactory;
use Fasil\Assignment3\Api\GradeInfoRepositoryInterface;
use Fasil\Assignment3\Model\ResourceModel\GradeInfo\CollectionFactory;
use Fasil\Assignment3\Model\GradeInfoFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Fasil\Assignment3\Api\Data\GradeInfoSearchResultsInterfaceFactory;

class GradeInfoRepository implements GradeInfoRepositoryInterface{

    public function __construct(CollectionFactory $collectionFactory,
        GradeInfoInterfaceFactory $gradeInfoInterfaceFactory,
        GradeInfoFactory $gradeInfoFactory,
        CollectionProcessorInterface $collectionProcessorInterface,
        GradeInfoSearchResultsInterfaceFactory $searchResultsFactory)
    {
        $this->collectionFactory = $collectionFactory;
        $this->gradeInfoInterfaceFactory = $gradeInfoInterfaceFactory;
        $this->gradeInfoFactory = $gradeInfoFactory;
        $this->collectionProcessorInterface = $collectionProcessorInterface;
        $this->searchResultsFactory = $searchResultsFactory;
    }
    /**
     * @inheritDoc
     */
    public function getById($id)
    {
        $gradeModel = $this->collectionFactory->create();
        $gradeModel->addFieldToFilter('student_id', ['eq'=>$id]);
        return $gradeModel->getData();
    }

    public function getGradeData($id)
    {
        $gradeModel = $this->gradeInfoFactory->create()->load($id);
        $gradeData = $this->gradeInfoInterfaceFactory->create();
        $gradeData->setId($gradeModel->getId());
        $gradeData->setStudentId($gradeModel->getStudentId());
        $gradeData->setGrade($gradeModel->getGrade());
        return $gradeData;
    }

    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $gradeData = $this->collectionFactory->create();
        $this->collectionProcessorInterface->process($searchCriteria, ($gradeData));
        $searchData = $this->searchResultsFactory->create();
        $searchData->setSearchCriteria($searchCriteria);
        $searchData->setItems($gradeData->getItems());
        $searchData->setTotalCount($gradeData->getSize());
        $searchData->setSearchCriteria($searchCriteria);
        return $searchData;
    }
}
