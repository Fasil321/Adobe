<?php

namespace Fasil\Assignment3\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface GradeInfoInterface extends ExtensibleDataInterface
{
    /**
     * Get grade id
     *
     * @return int
     */
    public function getId();

    /**
     * Set grade id
     *
     * @param int $id
     * @return void
     */
    public function setId($id);

    /**
     * Get student id
     *
     * @return int
     */
    public function getStudentId();

    /**
     * Set student id
     *
     * @param int $studentId
     * @return void
     */
    public function setStudentId($studentId);

    /**
     * Get grade
     *
     * @return string
     */
    public function getGrade();

    /**
     * Set grade
     *
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
    public function setExtensionAttributes(
        \Fasil\Assignment3\Api\Data\GradeInfoExtensionInterface $extensionAttributes
    );
}
