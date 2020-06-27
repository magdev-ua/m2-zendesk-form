<?php
namespace Dynamic\Contact\Model\ResourceModel\Contactforms;

use \Magento\Cms\Model\ResourceModel\AbstractCollection;

/**
 * CMS page collection
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * Load data for preview flag
     *
     * @var bool
     */
    protected $_previewFlag;

    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'contactforms_collection';

    /**
     * Event object
     *
     * @var string
     */
    protected $_eventObject = 'contactforms_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Dynamic\Contact\Model\Contactforms::class, \Dynamic\Contact\Model\ResourceModel\Contactforms::class);
    }

    public function addStoreFilter($store, $withAdmin = true)
    {
        // TODO: Implement addStoreFilter() method.
    }
}
