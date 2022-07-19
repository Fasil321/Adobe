<?php

namespace Fasil\Assignment3\Plugin;

use Fasil\Assignment3\Api\Data\StudentInfoSearchResultsInterface;
use Fasil\Assignment3\Api\StudentInfoRepositoryInterface;
use Fasil\Assignment3\Model\GradeInfoRepository;
use Fasil\Assignment3\Model\StudentInfoFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Exception\LocalizedException;

class AfterGetById
{
    /**
     * @var GradeInfoRepository
     */
    private GradeInfoRepository $gradeInfoRepository;

    /**
     * @var StudentInfoFactory
     */
    private StudentInfoFactory $studentInfoFactory;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * Constructor
     *
     * @param GradeInfoRepository $gradeInfoRepository
     * @param StudentInfoFactory $studentInfoFactory
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        GradeInfoRepository $gradeInfoRepository,
        StudentInfoFactory $studentInfoFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->gradeInfoRepository = $gradeInfoRepository;
        $this->studentInfoFactory = $studentInfoFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * After plugin for getlist method
     *
     * @param StudentInfoRepositoryInterface $subject
     * @param StudentInfoSearchResultsInterface $resultStudentInfo
     * @return StudentInfoSearchResultsInterface
     * @throws LocalizedException
     */
    public function afterGetList(
        StudentInfoRepositoryInterface $subject,
        StudentInfoSearchResultsInterface $resultStudentInfo
    ) {
        $grade=[];
        foreach ($resultStudentInfo->getItems() as $items) {
            try {
                $searchCriteria=$this->searchCriteriaBuilder->addFilter('student_id', $items->getId())->create();
                $data = $this->gradeInfoRepository->getList($searchCriteria)->getItems();
            } catch (NoSuchEntityException $e) {
                return $resultStudentInfo;
            }
            $extensionAttribute = $items->getExtensionAttributes();
            $extensionAttributeData = $extensionAttribute ? $extensionAttribute :
                $this->GradeInfoExtensionFactory->create();
            $extensionAttributeData->setGrade($data);
            $items->setExtensionAttributes($extensionAttributeData);
            $grade[] = $items;
        }
        $resultStudentInfo->setItems($grade);
        return $resultStudentInfo;
    }
}
