<?php


namespace Dynamic\Contact\Helper;


class Data
{
    protected $curl;
    public function __construct(
        \Magento\Framework\HTTP\Client\Curl $curl
    ) {
        $this->curl = $curl;
    }

    public function sendZendesc($data)
    {
        $url = 'https://{subdomain}.zendesk.com/api/v2/tickets.json';
        $params = array(
            'subject' => $data['subject'],
            'comment' => array('body' => $data['description']),
        );
        $this->curl->post($url, $params);
        //response will contain the output in form of JSON string
        $response = $this->curl->getBody();
        var_dump($response);exit;
    }
}
