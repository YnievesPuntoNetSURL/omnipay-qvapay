<?php

namespace Omnipay\QvaPay\Message;

class RequestTransactions extends AbstractRequest
{
    protected $liveEndpoint = 'https://qvapay.com/api/v1/transactions';
    protected $testEndpoint = 'https://stage.qvapay.com/api/v1/transactions';

    public function getData()
    {
        $this->setGrantType("client_credentials");
        return [
            'app_id'    => $this->getAppID(),
            'app_secret' => $this->getAppSecret()
        ];
    }

    public function sendData($data)
    {
        $url = $this->getEndpoint() . "?app_id=" . $data['app_id'] 
                                    . "&app_secret=" . $data['app_secret'];
        $headers = [
            'Cache-Control' => 'no-cache'
        ];
        $httpResponse = $this->httpClient->request('GET', $url, $headers);

        return ($this->createResponse(json_decode($httpResponse->getBody()->getContents())));
    }

    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    public function getAppID()
    {
        return $this->getParameter('app_id');
    }

    public function setAppID($value)
    {
        return $this->setParameter('app_id', $value);
    }

    public function getAppSecret()
    {
        return $this->getParameter('app_secret');
    }

    public function setAppSecret($value)
    {
        return $this->setParameter('app_secret', $value);
    }

    public function getGrantType()
    {
        return $this->getParameter('grant_type');
    }

    public function setGrantType($value)
    {
        return $this->setParameter('grant_type', $value);
    }

    protected function createResponse($data)
    {
        return $this->response = new ResponseTransactions($this, $data);
    }

}

?>
