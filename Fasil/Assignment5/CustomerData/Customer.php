<?php

namespace Fasil\Assignment5\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Config\ScopeConfigInterface;

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
    public function __construct(Session $session, ScopeConfigInterface $scopeConfig)
    {
        $this->session = $session;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @inheritDoc
     */
    public function getSectionData()
    {
        return [
            'emi' => $this->getEmiFilter()
        ];
    }

    public function getEmiOptions()
    {
        return json_decode($this->scopeConfig->getValue('emi_option/dynamic_emi/emi_options'),true);
    }

    public function getEmiFilter()
    {
        $emi = [];
        $emi_options = $this->getEmiOptions();
        $customer = $this->session->getCustomer();
        $customerGender = $customer->getGender();
        if(!$customerGender)
        {
            $customerGender = 1;
        }
        foreach ($emi_options as $option)
        {
            if ($option['gender']==$customerGender)
            {
                $emi[] = [
                    'interest_rate' => $option['interest_rate'],
                    'tenure' => $option['tenure'],
                    'gender' => $option['gender']
                ];
            }
        }
        return $emi;
    }
}
