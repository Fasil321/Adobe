<?php

namespace Unit4\RootCategories\ViewModel;
use Magento\Catalog\Api\Data\CategoryInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\StoreManager;

class StoresList implements ArgumentInterface
{
	protected $catalogCategory;
	public function __construct(CategoryInterface $catalogCategory, StoreManager $storeManager)
	{
		$this->catalogCategory = $catalogCategory;
		$this->_storeManager = $storeManager;

	}
	public function _toHtml()
	{
		$storesList = $this->_storeManager->getStores();
		$catalogCategory = $this->catalogCategory;
		$stores = [];
		foreach ($storesList as $store) {
			$categoryName = $catalogCategory->load($store->getRootCategoryId())->getName();
			$stores[] = [
				'store_name' => $store->getName(),
				'root_category_name' => $categoryName
			];
		}
		$stores = array_map(function($item)
		{
			$string = '<b>STORE</b> ' . $item['store_name'];
			$string .= ' <b>ROOT CATEGORY</b> ' . $item['root_category_name'] . '<br>';
			return $string;
		}, $stores);
		$response = implode('', $stores);
		return $response;
	}
}