<?php

namespace Fasil\Assignment3\Model;

use Fasil\Assignment3\Api\Data\GradeInfoInterfaceFactory;
use Fasil\Assignment3\Api\GradeInfoRepositoryInterface;
use Fasil\Assignment3\Model\ResourceModel\GradeInfo\CollectionFactory;

class GradeInfoRepository implements GradeInfoRepositoryInterface{

    public function __construct(CollectionFactory $collectionFactory, GradeInfoInterfaceFactory $gradeInfoInterfaceFactory)
    {
        $this->collectionFactory = $collectionFactory;
        $this->gradeInfoInterfaceFactory = $gradeInfoInterfaceFactory;
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
}
