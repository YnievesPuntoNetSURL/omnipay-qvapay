<?php

namespace Omnipay\QvaPay\Message;

class RequestTransaction extends AbstractRequest
{
    public function getData()
    {
        $this->setGrantType("client_credentials");
        return [
            'app_id'    => $this->getAppID(),
            'app_secret' => $this->getAppSecret(),
            'transaction' => $this->getTransaction()
        ];
    }

    public function sendData($data)
    {
        $url = $this->getEndpoint('transaction') . '/' . $data['transaction'] 
                                    . "?app_id=" . $data['app_id'] 
                                    . "&app_secret=" . $data['app_secret'];
        $headers = [
            'Cache-Control' => 'no-cache'
        ];
        $httpResponse = $this->httpClient->request('GET', $url, $headers);

        return ($this->createResponse(json_decode($httpResponse->getBody()->getContents())));
    }

    public function getTransaction()
    {
        return $this->getParameter('transaction');
    }

    public function setTransaction($value)
    {
        return $this->setParameter('transaction', $value);
    }

    protected function createResponse($data)
    {
        return $this->response = new ResponseTransaction($this, $data);
    }

}

?>
