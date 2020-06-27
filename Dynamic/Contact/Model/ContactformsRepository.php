<?php
namespace Dynamic\Contact\Model;


use Dynamic\Contact\Model\ResourceModel\Contactforms;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Model\AbstractModel;

class ContactformsRepository implements \Dynamic\Contact\Api\ContactformsRepositoryInterface
{
    protected $resource;
    public function __construct(Contactforms $resource)
    {
        $this->resource = $resource;
    }

    public function save(AbstractModel $model)
    {
        $this->resource->save($model);

        return $model;
    }

    public function getById($Id)
    {
        // TODO: Implement getById() method.
    }

    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        // TODO: Implement getList() method.
    }
}
