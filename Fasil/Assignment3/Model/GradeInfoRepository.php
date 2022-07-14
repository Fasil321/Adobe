<?php

namespace Fasil\Assignment3\Model;

use Fasil\Assignment3\Api\Data\GradeInfoInterfaceFactory;
use Fasil\Assignment3\Api\GradeInfoRepositoryInterface;
use Fasil\Assignment3\Model\ResourceModel\GradeInfo\CollectionFactory;
use Fasil\Assignment3\Model\GradeInfoFactory;

class GradeInfoRepository implements GradeInfoRepositoryInterface{

    public function __construct(CollectionFactory $collectionFactory, GradeInfoInterfaceFactory $gradeInfoInterfaceFactory, GradeInfoFactory $gradeInfoFactory)
    {
        $this->collectionFactory = $collectionFactory;
        $this->gradeInfoInterfaceFactory = $gradeInfoInterfaceFactory;
        $this->gradeInfoFactory = $gradeInfoFactory;
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
}
