<?php

namespace Fasil\Assignment3\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface StudentInfoSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get student list
     *
     * @return \Fasil\Assignment3\Api\Data\StudentInfoInterface[]
     */
    public function getItems();

    /**
     * Set student list.
     *
     * @param \Fasil\Assignment3\Api\Data\StudentInfoInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
