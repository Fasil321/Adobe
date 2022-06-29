<?php

namespace Training2\FactoryClass\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use \Magento\Framework\Controller\ResultFactory;
use \Magento\Customer\Model\CustomerFactory;
use \Magento\Store\Model\StoreManagerInterface;

class Index extends Action
{
    /**
     * @param Context $context
     */
    public function __construct(Context $context, CustomerFactory $customerFactory, StoreManagerInterface $storeManager)
    {
        $this->customerFactory = $customerFactory;
        $this->_storeManager = $storeManager;
        parent::__construct($context);
    }

    public function execute()
	{
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $emailid = $this->getRequest()->getParam('id');
        $websiteId = $this->_storeManager->getStore()->getWebsiteId();
        $customer = $this->customerFactory->create()->setWebsiteId($websiteId)->loadByEmail($emailid);
        $result->setContents($customer->getName());
		return $result;
	}

}
