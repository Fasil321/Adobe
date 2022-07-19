<?php

namespace Fasil\Assignment3\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\jsonFactory;
use Fasil\Assignment3\Api\StudentInfoRepositoryInterface;
use Magento\Framework\Controller\ResultInterface;

class Join extends Action
{
    /**
     * @var jsonFactory
     */
    private jsonFactory $jsonFactory;

    /**
     * @var StudentInfoRepositoryInterface
     */
    private StudentInfoRepositoryInterface $studentInfoRepository;

    /**
     * Constructor
     *
     * @param Context $context
     * @param jsonFactory $jsonFactory
     * @param StudentInfoRepositoryInterface $studentInfoRepository
     */
    public function __construct(
        Context $context,
        jsonFactory $jsonFactory,
        StudentInfoRepositoryInterface $studentInfoRepository
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->studentInfoRepository = $studentInfoRepository;
    }

    /**
     * Execute
     *
     * @return ResponseInterface|Json|ResultInterface
     */
    public function execute()
    {
        $result = $this->jsonFactory->create();
        $id = $this->getRequest()->getParam('id');
        $data = $this->studentInfoRepository->getStudentWithGrade($id);
        if ($data) {
            return $result->setData($data);
        }
        return $result->setData('No data with id '.$id);
    }
}
