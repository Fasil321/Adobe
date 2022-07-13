<?php

namespace Fasil\Assignment3\Model;

use Fasil\Assignment3\Api\Data\GradeInfoInterface;
use Fasil\Assignment3\Model\ResourceModel\GradeInfo as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class GradeInfo extends AbstractModel implements GradeInfoInterface
{
    const ID ='id';

    const STUDENT_ID = 'student_id';

    const GRADE = 'grade';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function setId($id)
    {
        return $this->setData(self::ID,$id);
    }

    /**
     * @inheritDoc
     */
    public function getStudentId()
    {
        return $this->getData(self::STUDENT_ID);
    }

    /**
     * @inheritDoc
     */
    public function setStudentId($studentId)
    {
        return $this->setData(self::STUDENT_ID, $studentId);
    }

    /**
     * @inheritDoc
     */
    public function getGrade()
    {
        return $this->getData(self::GRADE);
    }

    /**
     * @inheritDoc
     */
    public function setGrade($grade)
    {
        return $this->setData(self::GRADE, $grade);
    }
}
