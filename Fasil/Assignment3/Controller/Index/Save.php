<?php

namespace Fasil\Assignment3\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Fasil\Assignment3\Api\StudentInfoRepositoryInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\ResultInterface;

class Save extends Action
{
    /**
     * @var StudentInfoRepositoryInterface
     */
    private StudentInfoRepositoryInterface $studentInfoRepository;

    /**
     * Constructor
     *
     * @param Context $context
     * @param StudentInfoRepositoryInterface $studentInfoRepository
     * @param RedirectFactory $resultRedirectFactory
     */
    public function __construct(
        Context $context,
        StudentInfoRepositoryInterface $studentInfoRepository,
        RedirectFactory $resultRedirectFactory
    ) {
        parent::__construct($context);
        $this->studentInfoRepository = $studentInfoRepository;
        $this->resultRedirectFactory = $resultRedirectFactory;
    }


    /**
     * Execute method
     *
     * @return ResponseInterface|Redirect|ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $data = $this->getRequest()->getParams();
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id)
        {
            $student = $this->studentInfoRepository->getById($id);
            $student->setRegistrationNo($data['registration_no']);
            $student->setName($data['name']);
            $student->setEmail($data['email']);
            $student->setDob($data['dob']);
            $student->setAddress($data['address']);
            $student->setEnabled($data['enabled']);
            $this->studentInfoRepository->save($student);
            $this->messageManager->addSuccess(__('Saved successfully'));
        }
        else
        {
            $student = $this->studentInfoRepository;
            $student->setRegistrationNo($data['registration_no']);
            $student->setName($data['name']);
            $student->setEmail($data['email']);
            $student->setDob($data['dob']);
            $student->setAddress($data['address']);
            $student->setEnabled($data['enabled']);
            $this->studentInfoRepository->save($data);
        }
        return $resultRedirect->setPath('getlist/index/getlist');
    }
}
