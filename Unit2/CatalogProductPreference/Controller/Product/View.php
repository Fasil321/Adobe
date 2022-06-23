<?php
namespace Unit2\CatalogProductPreference\Controller\Product;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;
use \Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

class View extends Action
{
    /**
     * Show the result in product detail page
     *
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $rawResult = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $rawResult->setContents('Hello world');
        return $rawResult;
    }
}
