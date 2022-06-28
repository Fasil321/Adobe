<?php

namespace Training2\Preference\Controller\Action;

use \Magento\Framework\Controller\ResultFactory;
use Magento\Sales\Controller\Order\History;

class Index extends History
{
    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents('Order History page redirected');
        return $result;
    }
}
