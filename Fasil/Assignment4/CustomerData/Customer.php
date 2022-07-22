<?php

namespace Fasil\Assignment4\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Customer\Model\Session;

class Customer implements SectionSourceInterface
{
    /**
     * @var Session
     */
    private Session $session;

    /**
     * Constructor
     *
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * @inheritDoc
     */
    public function getSectionData()
    {
        $customer = $this->session->getCustomer();
        $customerName = $customer->getName();
        return [
            'name' => $customerName
        ];
    }
}
