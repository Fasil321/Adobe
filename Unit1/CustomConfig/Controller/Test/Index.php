<?php
namespace Unit1\CustomConfig\Controller\Test;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\Page;
use Unit1\CustomConfig\Model\Config;

class Index extends Action
{

    /**
     * @var Unit1\CustomConfig\Model\Config
     */
    private $customConfig;

    /**
     * Index constructor.
     *
     * @param Context $context
     * @param Config $customConfig
     */
    public function __construct(
        Context $context,
        Config $customConfig
    ) {
        $this->customConfig = $customConfig;
        return parent::__construct($context);
    }

    /**
     * Execute function
     *
     * @return Page
     */
    public function execute(): Page
    {
        $storeId = 1;
        $storeWelcomeMsg = $this->customConfig->get('messages/' . $storeId . '/message');

        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents($storeWelcomeMsg);

        return $result;
    }
}
