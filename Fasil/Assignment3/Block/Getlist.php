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

    /**
     * Constructor
     *
     * @param Template\Context $context
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param StudentInfoRepositoryInterface $studentInfoRepository
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        StudentInfoRepositoryInterface $studentInfoRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->studentInfoRepository = $studentInfoRepository;
    }

    /**
     * Get all data using search criteria
     *
     * @return \Fasil\Assignment3\Api\Data\StudentInfoInterface[]
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getListData()
    {
        $search = $this->searchCriteriaBuilder->create();
        return $this->studentInfoRepository->getList($search)->getItems();
    }
}
