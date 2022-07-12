<?php

namespace Fasil\Assignment3\Model\ResourceModel\GradeInfo;

use Fasil\Assignment3\Model\GradeInfo as Model;
use Fasil\Assignment3\Model\ResourceModel\GradeInfo as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
