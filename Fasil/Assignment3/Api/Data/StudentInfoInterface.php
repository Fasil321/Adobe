<?php

namespace Fasil\Assignment3\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface StudentInfoInterface extends ExtensibleDataInterface
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
    public function getRegistrationNo();

    /**
     * @param int $registrationNo
     * @return void
     */
    public function setRegistrationNo($registrationNo);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return void
     */
    public function setName($name);

    /**
     * @return string mixed
     */
    public function getEmail();

    /**
     * @param string $email
     * @return void
     */
    public function setEmail($email);

    /**
     * @return string
     */
    public function getDob();

    /**
     * @param string $dob
     * @return void
     */
    public function setDob($dob);

    /**
     * @return string
     */
    public function getAddress();

    /**
     * @param string $address
     * @return void
     */
    public function setAddress($address);

    /**
     * @return bool
     */
    public function getEnabled();

    /**
     * @param bool $enabled
     * @return void
     */
    public function setEnabled($enabled);

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Fasil\Assignment3\Api\Data\StudentInfoExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Fasil\Assignment3\Api\Data\StudentInfoExtensionInterface|null $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Fasil\Assignment3\Api\Data\StudentInfoExtensionInterface $extensionAttributes);
}
