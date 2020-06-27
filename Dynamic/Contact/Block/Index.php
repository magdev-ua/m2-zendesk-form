<?php
namespace Dynamic\Contact\Block;


use Magento\Framework\View\Element\Template;

class Index extends \Magento\Framework\View\Element\Template
{
    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }

    public function getPostActionUrl()
    {
        return $this->getUrl('help/contactforms/save');
    }
}
