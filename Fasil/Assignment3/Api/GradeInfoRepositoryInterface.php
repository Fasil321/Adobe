<?php

namespace Fasil\Assignment3\Api;

use Fasil\Assignment3\Api\Data\GradeInfoInterface;

interface GradeInfoRepositoryInterface
{
    /**
     * @param int $id
     * @return GradeInfoInterface[]
     */
    public function getById($id);
}
