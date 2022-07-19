<?php

namespace Fasil\Assignment3\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Fasil\Assignment3\Api\StudentInfoRepositoryInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\ResultInterface;
use Fasil\Assignment3\Api\Data\StudentInfoInterfaceFactory;

class Save extends Action
{
    /**
     * @var StudentInfoRepositoryInterface
     */
    private StudentInfoRepositoryInterface $studentInfoRepository;

    /**
     * @var StudentInfoInterfaceFactory
     */
    private StudentInfoInterfaceFactory $studentInfoInterfaceFactory;

    /**
     * Constructor
     *
     * @param Context $context
     * @param StudentInfoRepositoryInterface $studentInfoRepository
     * @param RedirectFactory $resultRedirectFactory
     * @param StudentInfoInterfaceFactory $studentInfoInterfaceFactory
     */
    public function __construct(
        Context $context,
        StudentInfoRepositoryInterface $studentInfoRepository,
        RedirectFactory $resultRedirectFactory,
        StudentInfoInterfaceFactory $studentInfoInterfaceFactory
    ) {
        parent::__construct($context);
        $this->studentInfoRepository = $studentInfoRepository;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->studentInfoInterfaceFactory = $studentInfoInterfaceFactory;
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
        if ($id) {
            $student = $this->studentInfoRepository->getById($id);
            $student->setRegistrationNo($data['registration_no']);
            $student->setName($data['name']);
            $student->setEmail($data['email']);
            $student->setDob($data['dob']);
            $student->setAddress($data['address']);
            $student->setEnabled($data['enabled']);
            $this->studentInfoRepository->save($student);
            $this->messageManager->addSuccess(__('Student data updated successfully'));
        } else {
            $student = $this->studentInfoInterfaceFactory->create();
            $student->setRegistrationNo($data['registration_no']);
            $student->setName($data['name']);
            $student->setEmail($data['email']);
            $student->setDob($data['dob']);
            $student->setAddress($data['address']);
            $student->setEnabled($data['enabled']);
            $this->studentInfoRepository->save($student);
            $this->messageManager->addSuccess(__('Student created successfully'));
        }
        return $resultRedirect->setPath('getlist/index/getlist');
    }
}
