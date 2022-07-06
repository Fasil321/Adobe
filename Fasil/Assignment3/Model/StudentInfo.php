<?php
namespace Fasil\Assignment3\Model;

use Magento\Framework\Model\AbstractModel;
use Fasil\Assignment3\Model\ResourceModel\StudentInfo as ResourceModel;

class StudentInfo extends AbstractModel
{
    /**
     * Model construct that should be used for object initialization
     *
     * @return void
     */
    protected function _construct(): void
    {
		$this->_init(ResourceModel::class);
	}
}
