<?php

namespace Fasil\Assignment3\Plugin;

class AfterGetById
{
    public function __construct(\Fasil\Assignment3\Model\GradeInfoRepository $gradeInfoRepository, \Fasil\Assignment3\Model\StudentInfoFactory $studentInfoFactory)
    {
        $this->gradeInfoRepository = $gradeInfoRepository;
        $this->studentInfoFactory = $studentInfoFactory;
    }
    public function afterGetById(\Fasil\Assignment3\Api\StudentInfoRepositoryInterface $subject, \Fasil\Assignment3\Api\Data\StudentInfoInterface $resultStudentInfo)
    {
        try {
            $data = $this->gradeInfoRepository->getById($resultStudentInfo->getId());
        } catch (NoSuchEntityException $e){
            return $resultStudentInfo;
        }
        $extensionAttribute = $resultStudentInfo->getExtensionAttributes();
        $extensionAttributeData = $extensionAttribute ? $extensionAttribute : $this->GradeInfoExtensionFactory->create();
        $extensionAttributeData->setGrade($data);
        $resultStudentInfo->setExtensionAttributes($extensionAttributeData);
        return $resultStudentInfo;
    }
}
