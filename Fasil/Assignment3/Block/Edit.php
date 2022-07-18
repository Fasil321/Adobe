<?php

namespace Fasil\Assignment3\Block;

use Magento\Framework\View\Element\Template;
use Fasil\Assignment3\Api\StudentInfoRepositoryInterface;

class Edit extends Template
{

    /**
     * @var StudentInfoRepositoryInterface
     */
    private StudentInfoRepositoryInterface $studentInfoRepository;

    /**
     * Constructor
     *
     * @param Template\Context $context
     * @param StudentInfoRepositoryInterface $studentInfoRepository
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        StudentInfoRepositoryInterface $studentInfoRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->studentInfoRepository = $studentInfoRepository;
    }

    /**
     * Get data by id
     *
     * @return \Fasil\Assignment3\Api\Data\StudentInfoInterface
     */
    public function getEditData()
    {
        $id = $this->getRequest()->getParam('id');
        return $this->studentInfoRepository->getById($id);
    }
}
