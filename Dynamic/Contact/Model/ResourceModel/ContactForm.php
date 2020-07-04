<?php

namespace Dynamic\Contact\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ContactForm  extends AbstractDb
{

    protected function _construct()
    {
        $this->_init('dynamic_contact', 'entity_id');
    }
}
