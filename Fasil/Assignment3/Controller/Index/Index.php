<?php
namespace Fasil\Assignment3\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\jsonFactory;
use Fasil\Assignment3\Api\StudentInfoRepositoryInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultInterface;

class Index extends Action
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
     * @param jsonFactory $jsonFactory
     * @param StudentInfoRepositoryInterface $studentInfoRepository
     * @param Context $context
     */
    public function __construct(
        jsonFactory $jsonFactory,
        StudentInfoRepositoryInterface $studentInfoRepository,
        Context $context
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
        $limit = $this->getRequest()->getParam('id');
        $collection = $this->studentInfoRepository->getDetails($limit);
        if ($collection) {
            return $result->setData($collection);
        }
        return  $result->setData('No result fount');
    }
}
