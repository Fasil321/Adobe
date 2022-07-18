<?php

namespace Fasil\Assignment3\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Fasil\Assignment3\Api\StudentInfoRepositoryInterface;

class Getlist extends Template
{
    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;
    /**
     * @var StudentInfoRepositoryInterface
     */
    private StudentInfoRepositoryInterface $studentInfoRepository;

    public function __construct(Template\Context $context, SearchCriteriaBuilder $searchCriteriaBuilder, StudentInfoRepositoryInterface $studentInfoRepository, array $data = [])
    {
        parent::__construct($context, $data);
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->studentInfoRepository = $studentInfoRepository;
    }

    public function getListData()
    {
        $search = $this->searchCriteriaBuilder->create();
        $data = $this->studentInfoRepository->getList($search)->getItems();
        return $data;
    }
}
