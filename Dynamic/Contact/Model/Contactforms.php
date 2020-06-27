<?php
namespace Dynamic\Contact\Model;

use Dynamic\Contact\Api\Data\ContactformsInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;


class Contactforms extends AbstractModel implements ContactformsInterface, IdentityInterface
{
    const CACHE_TAG = 'cms_p';

    protected $_cacheTag = self::CACHE_TAG;

    protected $_eventPrefix = 'cms_page';

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    protected function _construct()
    {
        $this->_init(\Dynamic\Contact\Model\ResourceModel\Contactforms::class);
    }

    public function load($id, $field = null)
    {
        if ($id === null) {
            return $this->noRoutePage();
        }
        return parent::load($id, $field);
    }


    public function getSubject()
    {
        return $this->getData('subject');
    }

    public function getCustomerName()
    {
        return $this->getData('customer_name');
    }


    public function getEmail()
    {
        return $this->getData('email');
    }


    public function getOrderNumber()
    {
        return $this->getData('order_number');
    }


    public function getImage()
    {
        return $this->getData('image');
    }


    public function getDescription()
    {
        return $this->getData('description');
    }

    public function getIdentities()
    {
        return $this->getData('entity_id');
    }
}
