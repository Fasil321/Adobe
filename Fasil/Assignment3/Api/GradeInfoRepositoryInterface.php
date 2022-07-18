<?php

namespace Fasil\Assignment3\Api;

use Fasil\Assignment3\Api\Data\GradeInfoInterface;
use Fasil\Assignment3\Api\Data\GradeInfoSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;

interface GradeInfoRepositoryInterface
{
    /**
     * @param int $id
     * @return GradeInfoInterface[]
     */
    public function getById($id);

    /**
     * @param int $id
     * @return GradeInfoInterface
     */
    public function getGradeData($id);

    /**
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return GradeInfoSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
