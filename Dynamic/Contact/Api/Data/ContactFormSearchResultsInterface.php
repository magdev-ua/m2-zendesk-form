<?php
declare(strict_types=1);

namespace Dynamic\Contact\Api\Data;

interface ContactFormSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    public function getItems() : array;

    public function setItems(array $items);
}
