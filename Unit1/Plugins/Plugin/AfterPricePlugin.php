<?php
namespace Unit1\Plugins\Plugin;

use Magento\Catalog\Model\Product;

class AfterPricePlugin
{
    /**
     * Return price after adding value
     *
     * @param Product $subject
     * @param array $result
     * @return float
     */
    public function afterGetPrice(Product $subject, $result): float
    {
        return $result+2.33;
    }
}
