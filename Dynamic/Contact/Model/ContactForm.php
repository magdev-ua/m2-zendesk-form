<?php
namespace Dynamic\Contact\Model;

use Dynamic\Contact\Api\Data\ContactFormInterface;
use Magento\Framework\Model\AbstractModel;

class ContactForm extends AbstractModel implements ContactFormInterface
{
    protected function _construct()
    {
        $this->_init(\Dynamic\Contact\Model\ResourceModel\ContactForm::class);
    }

    public function getSubject() : string
    {
        return $this->getData('subject');
    }

    public function getCustomerName() : string
    {
        return $this->getData('customer_name');
    }

    public function getEmail() : string
    {
        return $this->getData('email');
    }

    public function getOrderNumber() : string
    {
        return $this->getData('order_number');
    }

    public function getImage() : string
    {
        return $this->getData('image');
    }

    public function getDescription() : string
    {
        return $this->getData('description');
    }
}
