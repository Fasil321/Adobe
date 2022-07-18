<?php

namespace Fasil\Assignment3\Plugin;

use Magento\Framework\Api\SearchCriteriaBuilder;

class AfterGetById
{
    public function __construct(\Fasil\Assignment3\Model\GradeInfoRepository $gradeInfoRepository, \Fasil\Assignment3\Model\StudentInfoFactory $studentInfoFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder)
    {
        $this->gradeInfoRepository = $gradeInfoRepository;
        $this->studentInfoFactory = $studentInfoFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    public function afterGetList(\Fasil\Assignment3\Api\StudentInfoRepositoryInterface $subject, \Fasil\Assignment3\Api\Data\StudentInfoSearchResultsInterface $resultStudentInfo)
    {
        $grade=[];
        foreach ($resultStudentInfo->getItems() as $items) {
            try {
                $searchCriteria=$this->searchCriteriaBuilder->addFilter('student_id', $items->getId())->create();
                $data = $this->gradeInfoRepository->getList($searchCriteria)->getItems();
            } catch (NoSuchEntityException $e) {
                return $resultStudentInfo;
            }
            $extensionAttribute = $items->getExtensionAttributes();
            $extensionAttributeData = $extensionAttribute ? $extensionAttribute : $this->GradeInfoExtensionFactory->create();
            $extensionAttributeData->setGrade($data);
            $items->setExtensionAttributes($extensionAttributeData);
            $grade[] = $items;
        }
        $resultStudentInfo->setItems($grade);
        return $resultStudentInfo;
    }
}
