<?php

namespace Fasil\Assignment3\Plugin;

use Fasil\Assignment3\Api\Data\GradeInfoSearchResultsInterface;
use Fasil\Assignment3\Api\GradeInfoRepositoryInterface;
use Fasil\Assignment3\Model\StudentInfoRepository;

class AfterGetGradeData
{
    /**
     * @var StudentInfoRepository
     */
    private StudentInfoRepository $studentInfoRepository;

    /**
     * Constructor
     *
     * @param StudentInfoRepository $studentInfoRepository
     */
    public function __construct(StudentInfoRepository $studentInfoRepository)
    {
        $this->studentInfoRepository = $studentInfoRepository;
    }

    /**
     * After plugin for getlist method
     *
     * @param GradeInfoRepositoryInterface $subject
     * @param GradeInfoSearchResultsInterface $resultGradeInfo
     * @return GradeInfoSearchResultsInterface
     */
    public function afterGetList(
        GradeInfoRepositoryInterface $subject,
        GradeInfoSearchResultsInterface $resultGradeInfo
    ) {
        $student=[];
        foreach ($resultGradeInfo->getItems() as $items) {
            try {
                $data = $this->studentInfoRepository->getStudentData($items->getStudentId());
            } catch (NoSuchEntityException $e) {
                return $resultGradeInfo;
            }
            $extensionAttribute = $items->getExtensionAttributes();
            $extensionAttributeData = $extensionAttribute ? $extensionAttribute :
                $this->StudentInfoExtensionFactory->create();
            $extensionAttributeData->setStudent($data);
            $items->setExtensionAttributes($extensionAttributeData);
            $student[] = $items;
        }
        $resultGradeInfo->setItems($student);
        return $resultGradeInfo;
    }
}
