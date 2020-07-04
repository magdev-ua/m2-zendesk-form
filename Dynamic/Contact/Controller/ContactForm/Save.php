<?php
declare(strict_types=1);

namespace Dynamic\Contact\Controller\ContactForm;

use Dynamic\Contact\Api\ContactFormRepositoryInterface;
use Dynamic\Contact\Helper\Zendesk\Client;
use Dynamic\Contact\Helper\Zendesk\ImageLoader;
use Dynamic\Contact\Model\ContactFormFactory;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Save extends Action
{
    /**
     * @var Session
     */
    private $session;

    /**
     * @var ContactFormFactory
     */
    private $contactFormFactory;

    /**
     * @var ContactFormRepositoryInterface
     */
    private $contactFormRepository;

    /**
     * @var Client
     */
    private $zendeskClient;

    /**
     * @var ImageLoader
     */
    private $imageLoader;

    public function __construct(
        Context $context,
        Session $customerSession,
        ContactFormFactory $contactFormFactory,
        ContactFormRepositoryInterface $contactFormRepository,
        ImageLoader $imageLoader,
        Client $zendeskClient
    ) {
        $this->session = $customerSession;
        $this->contactFormFactory = $contactFormFactory;
        $this->contactFormRepository = $contactFormRepository;
        $this->zendeskClient = $zendeskClient;
        $this->imageLoader = $imageLoader;
        parent::__construct($context);
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $customerId = null;
        if ($this->session->isLoggedIn()) {
            $customerId = $this->session->getCustomer()->getId();
        }
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPostValue();
            $model = $this->contactFormFactory->create();
            $data['customer_id'] = $customerId;
            $imageName = $this->imageLoader->upload('image');

            $model->setData($data);
            $model->setImage($imageName);

            try {
                $this->contactFormRepository->save($model);
                //$this->zendeskClient->createTicket($model);
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            }
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('/');

        return $resultRedirect;
    }
}
