<?php

namespace Omnipay\QvaPay\Message;

class RequestInfo extends AbstractRequest
{
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
        $url = $this->getEndpoint('info') . "?app_id=" . $data['app_id'] 
                                    . "&app_secret=" . $data['app_secret'];
        $headers = [
            'Cache-Control' => 'no-cache'
        ];
        $httpResponse = $this->httpClient->request('GET', $url, $headers);

        return ($this->createResponse(json_decode($httpResponse->getBody()->getContents())));
    }

    protected function createResponse($data)
    {
        return $this->response = new ResponseInfo($this, $data);
    }

}
?>
