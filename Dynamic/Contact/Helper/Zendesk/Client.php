<?php
declare(strict_types=1);

namespace Dynamic\Contact\Helper\Zendesk;

use Dynamic\Contact\Api\Data\ContactFormInterface;
use Magento\Framework\HTTP\Client\Curl;
use Monolog\Logger;

class Client
{
    private $curl;
    private $logger;

    public function __construct(
        Curl $curl,
        Logger $logger
    ) {
        $this->curl = $curl;
        $this->logger = $logger;
    }

    public function createTicket(ContactFormInterface $model) : bool
    {
        $url = $this->getZendeskUrl() . '/api/v2/tickets.json';
        $params = [
            'subject' => $model->getSubject(),
            'comment' => ['body' => $model->getDescription()],
        ];
        $this->setCredentials();

        try {
            $this->curl->post($url, $params);
        } catch (\Exception $e) {
            $this->logger->error(
                __("Zendesk ticket was not created. Contact form id - ") . $model->getId()
            . $e->getMessage()
            );
            return false;
        }

        if ($this->curl->getStatus() == 200) {
            return true;
        } else {
            $this->logger->error(
                __("Zendesk ticket was not created. Contact form id - ") . $model->getId()
                . __("Please check Zendesk credentials.")
            );
            return false;
        }
    }

    private function setCredentials() : void
    {
        //@todo needs to implement configuration for credentials
        $token = '';
        $secretKey = '';
        $this->curl->setCredentials($token, $secretKey);
    }

    private function getZendeskUrl() : string
    {
        //@todo needs to implement configuration for zendesk subdomain
        $subdomain = '';

        return "https://{$subdomain}.zendesk.com";
    }
}
