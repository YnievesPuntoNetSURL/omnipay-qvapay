<?php

namespace Omnipay\QvaPay\Message;

class RequestCreateInvoice extends AbstractRequest
{
    protected $liveEndpoint = 'https://qvapay.com/api/v1/create_invoice';
    protected $testEndpoint = 'https://stage.qvapay.com/api/v1/create_invoice';

    public function getData()
    {
        $this->setGrantType("client_credentials");
        return [
            'app_id'    => $this->getAppID(),
            'app_secret' => $this->getAppSecret(),
            'amount' => $this->getAmount(),
            'description' => $this->getDescription(),
            'remote_id' => $this->getRemoteID(),
            'signed' => $this->getSigned(),
        ];
    }

    public function sendData($data)
    {
        $url = $this->getEndpoint() . "?app_id=" . $data['app_id']
                                    . "&app_secret=" . $data['app_secret']
                                    . "&amount=" . $data['amount']
                                    . "&description=" . $data['description']
                                    . "&remote_id=" . $data['remote_id']
                                    . "&signed=" . $data['signed'];
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

    public function getAmount()
    {
        return $this->getParameter('amount');
    }

    public function getDescription()
    {
        return $this->getParameter('description');
    }

    public function getRemoteID()
    {
        return $this->getParameter('remote_id');
    }

    public function setRemoteID($value)
    {
        return $this->setParameter('remote_id', $value);
    }

    public function getSigned()
    {
        return $this->getParameter('signed');
    }

    public function setSigned($value)
    {
        return $this->setParameter('signed', $value);
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
        return $this->response = new ResponseCreateInvoice($this, $data);
    }

}

?>
