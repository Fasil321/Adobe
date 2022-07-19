<?php
namespace Fasil\Assignment3\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Fasil\Assignment3\Api\Data\StudentInfoInterface;
use Fasil\Assignment3\Model\ResourceModel\StudentInfo as ResourceModel;

class StudentInfo extends AbstractExtensibleModel implements StudentInfoInterface
{
    public const ID = 'entity_id';
    public const REGISTERNO = 'registration_no';
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const DOB = 'dob';
    public const ADDRESS = 'address';
    public const ENABLED ='enabled';

    /**
     * Model construct that should be used for object initialization
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * @inheritDoc
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * @inheritDoc
     */
    public function getRegistrationNo()
    {
        return $this->getData(self::REGISTERNO);
    }

    /**
     * @inheritDoc
     */
    public function setRegistrationNo($registrationNo)
    {
        return $this->setData(self::REGISTERNO, $registrationNo);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * @inheritDoc
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * @inheritDoc
     */
    public function getDob()
    {
        return $this->getData(self::DOB);
    }

    /**
     * @inheritDoc
     */
    public function setDob($dob)
    {
        return $this->setData(self::DOB, $dob);
    }

    /**
     * @inheritDoc
     */
    public function getAddress()
    {
        return $this->getData(self::ADDRESS);
    }

    /**
     * @inheritDoc
     */
    public function setAddress($address)
    {
        return $this->setData(self::ADDRESS, $address);
    }

    /**
     * @inheritDoc
     */
    public function getEnabled()
    {
        return $this->getData(self::ENABLED);
    }

    /**
     * @inheritDoc
     */
    public function setEnabled($enabled)
    {
        return $this->setData(self::ENABLED, $enabled);
    }

    /**
     * @inheritdoc
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @inheritdoc
     */
    public function setExtensionAttributes(
        \Fasil\Assignment3\Api\Data\StudentInfoExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
