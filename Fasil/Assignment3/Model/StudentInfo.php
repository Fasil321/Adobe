<?php
namespace Fasil\Assignment3\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Magento\Framework\Model\AbstractModel;
use Fasil\Assignment3\Api\Data\StudentInfoInterface;
use Fasil\Assignment3\Model\ResourceModel\StudentInfo as ResourceModel;

class StudentInfo extends AbstractExtensibleModel implements StudentInfoInterface
{
    const ID = 'entity_id';
    const REGISTERNO = 'registration_no';
    const NAME = 'name';
    const EMAIL = 'email';
    const DOB = 'dob';
    const ADDRESS = 'address';
    const ENABLED ='enabled';

    /**
     * Model construct that should be used for object initialization
     *
     * @return void
     */
    protected function _construct(): void
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

    public function getRegistrationNo()
    {
        return $this->getData(self::REGISTERNO);
    }

    public function setRegistrationNo($registrationNo)
    {
        return $this->setData(self::REGISTERNO, $registrationNo);
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    public function getDob()
    {
        return $this->getData(self::DOB);
    }

    public function setDob($dob)
    {
        return $this->setData(self::DOB, $dob);
    }

    public function getAddress()
    {
        return $this->getData(self::ADDRESS);
    }

    public function setAddress($address)
    {
        return $this->setData(self::ADDRESS, $address);
    }

    public function getEnabled()
    {
        return $this->getData(self::ENABLED);
    }

    public function setEnabled($enabled)
    {
        return $this->setData(self::ENABLED, $enabled);
    }

    /**
     * @inheritdoc
     *
     * @return \Fasil\Assignment3\Api\Data\GradeInfoInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @inheritdoc
     *
     * @param \Fasil\Assignment3\Api\Data\GradeInfoInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Fasil\Assignment3\Api\Data\GradeInfoInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
