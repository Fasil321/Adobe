<?php

namespace Fasil\Assignment3\Api;

use Fasil\Assignment3\Api\Data\StudentInfoInterface;
use Fasil\Assignment3\Api\Data\StudentInfoSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;

interface StudentInfoRepositoryInterface
{
    /**
     * Return collection by id
     *
     * @param int $id
     * @return StudentInfoInterface
     */
    public function getById($id);

    /**
     * @param int $limit
     * @return StudentInfoInterface
     */
    public function getDetails($limit);

    /**
     * @param int $id
     * @return StudentInfoInterface
     */
    public function getStudentWithGrade($id);

    /**
     * @param int $id
     * @return StudentInfoInterface[]
     */
    public function  getStudentData($id);

    /**
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return StudentInfoSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param int $id
     * @return \Fasil\Assignment3\Api\Data\StudentInfoInterface
     */
    public function save($id);

    /**
     * @param int $id
     * @return bool true on success
     */
    public function delete($id);
}
