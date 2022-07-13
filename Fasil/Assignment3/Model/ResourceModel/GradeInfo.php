<?php

namespace Fasil\Assignment3\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class GradeInfo extends AbstractDb
{
    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('student_grade', 'id');
    }
}
