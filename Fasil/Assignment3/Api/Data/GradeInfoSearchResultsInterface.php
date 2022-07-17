<?php

namespace Fasil\Assignment3\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface GradeInfoSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get grade list
     *
     * @return \Fasil\Assignment3\Api\Data\GradeInfoInterface[]
     */
    public function getItems();

    /**
     * Set garde list.
     *
     * @param \Fasil\Assignment3\Api\Data\GradeInfoInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
