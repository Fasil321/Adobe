<?php

namespace Fasil\Assignment3\Plugin;

use Fasil\Assignment3\Model\StudentInfoRepository;

class AfterGetGradeData
{
    public function __construct(StudentInfoRepository $studentInfoRepository)
    {
        $this->studentInfoRepository = $studentInfoRepository;
    }

    public function afterGetList(\Fasil\Assignment3\Api\GradeInfoRepositoryInterface $subject, \Fasil\Assignment3\Api\Data\GradeInfoSearchResultsInterface $resultGradeInfo)
    {
        $student=[];
        foreach ($resultGradeInfo->getItems() as $items) {
            try {
                $data = $this->studentInfoRepository->getStudentData($items->getStudentId());
            } catch (NoSuchEntityException $e) {
                return $resultGradeInfo;
            }
            $extensionAttribute = $items->getExtensionAttributes();
            $extensionAttributeData = $extensionAttribute ? $extensionAttribute : $this->StudentInfoExtensionFactory->create();
            $extensionAttributeData->setStudent($data);
            $items->setExtensionAttributes($extensionAttributeData);
            $student[] = $items;
        }
        $resultGradeInfo->setItems($student);
        return $resultGradeInfo;
    }
}
