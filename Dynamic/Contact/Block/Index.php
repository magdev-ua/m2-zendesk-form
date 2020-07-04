<?php
declare(strict_types=1);

namespace Dynamic\Contact\Block;

use Magento\Framework\View\Element\Template;

class Index extends Template
{
    /**
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getPostActionUrl() : string
    {
        return $this->getUrl('help/contactform/save');
    }

    public function getAjaxLoginActionUrl() : string
    {
        return $this->getUrl('customer/ajax/login');
    }
}
