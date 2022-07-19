<?php

namespace Fasil\Assignment3\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface StudentInfoInterface extends ExtensibleDataInterface
{
    /**
     * Get id
     *
     * @return int
     */
    public function getId();

    /**
     * Set id
     *
     * @param int $id
     * @return void
     */
    public function setId($id);

    /**
     * Get registration no
     *
     * @return int
     */
    public function getRegistrationNo();

    /**
     * Set registration no
     *
     * @param int $registrationNo
     * @return void
     */
    public function setRegistrationNo($registrationNo);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set name
     *
     * @param string $name
     * @return void
     */
    public function setName($name);

    /**
     * Get email
     *
     * @return string mixed
     */
    public function getEmail();

    /**
     * Set email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email);

    /**
     * Get dob
     *
     * @return string
     */
    public function getDob();

    /**
     * Set dob
     *
     * @param string $dob
     * @return void
     */
    public function setDob($dob);

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress();

    /**
     * Set address
     *
     * @param string $address
     * @return void
     */
    public function setAddress($address);

    /**
     * Get enabled or disabled status
     *
     * @return bool
     */
    public function getEnabled();

    /**
     * Set enabled or disabled status
     *
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
    public function setExtensionAttributes(
        \Fasil\Assignment3\Api\Data\StudentInfoExtensionInterface $extensionAttributes
    );
}
