<?php
namespace Dynamic\Contact\Model\ResourceModel\ContactForm;

use Dynamic\Contact\Model\ContactForm as Model;
use Dynamic\Contact\Model\ResourceModel\ContactForm as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
