<?php
namespace Dynamic\Contact\Controller\Contactforms;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Context;
use Dynamic\Contact\Model\ContactformsFactory;
use Dynamic\Contact\Api\ContactformsRepositoryInterface;
use Dynamic\Contact\Helper\Data;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $session;
    protected $contactformsFactory;
    protected $contactformsRepository;
    protected $helper;
    public function __construct(
        Context $context,
        Session $customerSession,
        ContactformsFactory $contactformsFactory,
        ContactformsRepositoryInterface $contactformsRepository,
        Data $helper
    ) {
        $this->session = $customerSession;
        $this->contactformsFactory = $contactformsFactory;
        $this->contactformsRepository = $contactformsRepository;
        $this->helper = $helper;
        parent::__construct($context);
    }

    public function execute()
    {
        $customerId = null;
        if ($this->session->isLoggedIn()) {
            $customerId = $this->session->getCustomer()->getId();
        }
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPostValue();
            $model = $this->contactformsFactory->create();
            $data['customer_id'] = $customerId;
            $model->setData($data);

            try {
                $this->contactformsRepository->save($model);
                $this->helper->sendZendesc($data);
            } catch (\Throwable $e) {
                var_dump($e);
               // $this->messageManager->addErrorMessage($e->getMessage());
            }
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('/');
        return $resultRedirect;
    }
}
