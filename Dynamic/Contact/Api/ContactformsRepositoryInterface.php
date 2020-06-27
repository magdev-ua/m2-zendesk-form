<?php
namespace Dynamic\Contact\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Model\AbstractModel;

interface ContactformsRepositoryInterface
{
    /**
     * Save PasswordLog
     *
     * @param  AbstractModel $model
     * @return \Dynamic\Contact\Api\Data\ContactformsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(AbstractModel $model);

    /**
     * Retrieve PasswordLog
     *
     * @param  string $Id
     * @return \Dynamic\Contact\Api\Data\ContactformsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($Id);

    /**
     * Retrieve PasswordLog matching the specified criteria.
     *
     * @param  \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \KiwiCommerce\CustomerPassword\Api\Data\ContactformsSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        SearchCriteriaInterface $searchCriteria
    );
}
