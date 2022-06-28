<?php

namespace Unit3\ProductViewDescriptionPlugin\Block\Product\View;

class Description extends \Magento\Catalog\Block\Product\View\Description
{

	public function beforeToHtml(\Magento\Catalog\Block\Product\View\Description $description)
	{
		$description->getProduct()->setDescription('test description here!');
	}
}