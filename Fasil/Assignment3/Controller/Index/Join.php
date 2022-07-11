<?php

namespace Fasil\Assignment3\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\jsonFactory;
use Fasil\Assignment3\Api\StudentInfoRepositoryInterface;

class Join extends Action
{
	public function __construct(Context $context, jsonFactory $jsonFactory, StudentInfoRepositoryInterface $studentInfoRepository)
	{
		parent::__construct($context);
		$this->jsonFactory = $jsonFactory;
		$this->studentInfoRepository = $studentInfoRepository;
	}

	public function execute()
	{
		$result = $this->jsonFactory->create();
		$id = $this->getRequest()->getParam('id');

		$data = $this->studentInfoRepository->getStudentWithGrade($id);
		if($data){
			return $result->setData($data);
		}
		return $result->setData('No data with id '.$id);
	}
}
