<?php

namespace Fasil\Assignment3\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface GradeInfoInterface extends ExtensibleDataInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return void
     */
    public function setId($id);

    /**
     * @return int
     */
    public function getStudentId();

    /**
     * @param int $studentId
     * @return void
     */
    public function setStudentId($studentId);

    /**
     * @return string
     */
    public function getGrade();

    /**
     * @param string $grade
     * @return void
     */
    public function setGrade($grade);

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Fasil\Assignment3\Api\Data\GradeInfoExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Fasil\Assignment3\Api\Data\GradeInfoExtensionInterface|null $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Fasil\Assignment3\Api\Data\GradeInfoExtensionInterface $extensionAttributes);
}
