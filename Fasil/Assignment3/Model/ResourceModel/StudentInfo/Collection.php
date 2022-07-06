<?php

namespace Fasil\Assignment3\Model\ResourceModel\StudentInfo;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Fasil\Assignment3\Model\StudentInfo as Model;
use Fasil\Assignment3\Model\ResourceModel\StudentInfo as ResourceModel;

class Collection extends AbstractCollection
{
    /**
     * Initialization here
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
