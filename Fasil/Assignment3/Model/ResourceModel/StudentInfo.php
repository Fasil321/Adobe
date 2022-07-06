<?php

namespace Fasil\Assignment3\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class StudentInfo extends AbstractDb
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct(): void
    {
    	$this->_init('student_info','entity_id');
    }
}
