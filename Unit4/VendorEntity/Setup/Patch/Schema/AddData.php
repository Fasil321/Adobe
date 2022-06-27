<?php

namespace Unit4\VendorEntity\Setup\Patch\Schema;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

class AddData implements DataPatchInterface
{
    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
    	$this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply()
    {
    	$this->moduleDataSetup->startSetup();
    	$this->moduleDataSetup->getConnection()->insert('vendor_entity',
    		[
    			'code' => 'Arun',
    			'contact' => '9874563210',
    			'goods_type' => 'food'
    		]
    	);
    }

    public static function getDependencies()
    {
    	return [];
    }

    public function getAliases()
    {
    	return [];
    }
}
