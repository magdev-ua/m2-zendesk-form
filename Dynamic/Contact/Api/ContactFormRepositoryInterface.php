<?php
namespace Dynamic\Contact\Api;

use Dynamic\Contact\Api\Data\ContactFormInterface;
use Dynamic\Contact\Api\Data\ContactFormSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;

interface ContactFormRepositoryInterface
{
    /**
     *
     * @param  ContactFormInterface $model
     * @return ContactFormInterface
     * @throws LocalizedException
     */
    public function save(ContactFormInterface $model) : ContactFormInterface;

    /**
     *
     * @param  string | int $Id
     * @return ContactFormInterface
     * @throws LocalizedException
     */
    public function getById($Id) : ContactFormInterface;

    /**
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return ContactFormSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria) : ContactFormSearchResultsInterface;
}
