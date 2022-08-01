<?php

namespace Fasil\Assignment5\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Catalog\Api\Data\ProductInterfaceFactory;

class Data implements ArgumentInterface
{
    private ProductInterfaceFactory $productFactory;

    /**
     * @param ProductInterfaceFactory $productFactory
     */
    public function __construct(ProductInterfaceFactory $productFactory)
    {
        $this->productFactory = $productFactory;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProductPrice($id)
    {
        $product = $this->productFactory->create();
        $productPriceById = $product->load($id)->getPrice();
        return $productPriceById;
    }
}
