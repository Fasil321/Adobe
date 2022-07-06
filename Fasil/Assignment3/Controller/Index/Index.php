<?php

namespace Fasil\Assignment3\Controller\Index;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\Result\jsonFactory;
use Fasil\Assignment3\Api\StudentInfoRepositoryInterface;
use Magento\Framework\App\Action\Context;

class Index extends Action
{
    private jsonFactory $jsonFactory;
    private StudentInfoRepositoryInterface $studentInfoRepository;

    /**
     * Constructor
     *
     * @param Context $context
     */
    public function __construct(jsonFactory $jsonFactory, StudentInfoRepositoryInterface $studentInfoRepository, Context $context)
	{
		parent::__construct($context);
		$this->jsonFactory = $jsonFactory;
		$this->studentInfoRepository = $studentInfoRepository;
	}

    /**
     * Execute
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Json|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $result = $this->jsonFactory->create();
        $id = $this->getRequest()->getParam('id');
        $collection = $this->studentInfoRepository->getById($id);
        if(($collection->getData())) {
            return $result->setData($collection);
        }
        return  $result->setData('No result fount');
    }
}
