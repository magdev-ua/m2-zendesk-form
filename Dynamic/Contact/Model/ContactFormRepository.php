<?php
namespace Dynamic\Contact\Model;

use Dynamic\Contact\Api\ContactFormRepositoryInterface;
use Dynamic\Contact\Api\Data\ContactFormInterface;
use Dynamic\Contact\Api\Data\ContactFormSearchResultsInterface;
use Dynamic\Contact\Model\ResourceModel\ContactForm;
use Magento\Framework\Api\SearchCriteriaInterface;

class ContactFormRepository implements ContactFormRepositoryInterface
{
    private $resource;

    public function __construct(ContactForm $resource)
    {
        $this->resource = $resource;
    }

    public function save(ContactFormInterface $model) : ContactFormInterface
    {
        $this->resource->save($model);

        return $model;
    }

    public function getById($Id) : ContactFormInterface
    {
        // TODO: Implement getById() method.
    }

    public function getList(SearchCriteriaInterface $searchCriteria) : ContactFormSearchResultsInterface
    {
        // TODO: Implement getList() method.
    }
}
