<?php
namespace Fasil\Assignment3\Controller\Index;

use Fasil\Assignment3\Api\StudentInfoRepositoryInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Delete extends Action
{

    /**
     * @var PageFactory
     */
    private PageFactory $pageFactory;

    /**
     * @var StudentInfoRepositoryInterface
     */
    private StudentInfoRepositoryInterface $studentInfoRepository;

    /**
     * Constructor.
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
     * Execute action based on request and return result
     *
     * @return ResultInterface|ResponseInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        $this->studentInfoRepository->delete($id);
        $this->messageManager->addSuccess(__('Student deleted successfully'));
        return $resultRedirect->setPath('getlist/index/getlist');
    }
}
