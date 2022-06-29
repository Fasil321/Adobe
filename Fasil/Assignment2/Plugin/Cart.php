<?php

namespace Fasil\Assignment2\Plugin;

class Cart
{
    /**
     * Update the quantity before add product
     *
     * @param \Magento\Checkout\Model\Cart $subject
     * @param int|Product $productInfo $productInfo
     * @param \Magento\Framework\DataObject|int|array $requestInfo
     * @return array
     */
    public function beforeAddProduct(\Magento\Checkout\Model\Cart $subject, $productInfo, $requestInfo = null)
    {
        $requestInfo['qty'] = $requestInfo['qty']+1;
        return [$productInfo,$requestInfo];
    }
}
