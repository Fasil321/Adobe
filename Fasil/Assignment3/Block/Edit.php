<?php

namespace Fasil\Assignment3\Block;

use Magento\Framework\View\Element\Template;
use Fasil\Assignment3\Api\StudentInfoRepositoryInterface;
use Fasil\Assignment3\Model\ResourceModel\StudentInfo\CollectionFactory;

class Edit extends Template
{

    /**
     * @var StudentInfoRepositoryInterface
     */
    private StudentInfoRepositoryInterface $studentInfoRepository;

    public function __construct(Template\Context $context, StudentInfoRepositoryInterface $studentInfoRepository, CollectionFactory $collectionFactory, array $data = [])
    {
        parent::__construct($context, $data);
        $this->studentInfoRepository = $studentInfoRepository;
        $this->collectionFactory = $collectionFactory;
    }

    public function getEditData()
    {
        $id = $this->getRequest()->getParam('id');
        $gradeModel = $this->collectionFactory->create()->load($id);
        return $gradeModel->getData();
    }
}
