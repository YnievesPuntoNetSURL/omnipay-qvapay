<?php

namespace Omnipay\QvaPay\Message;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $endpoint = 'https://qvapay.com/api/v1/';

    public function getData()
    {
        $data = $this->getExternalReference();
        return $data;
    }

    public function sendData($data)
    {
        $url = $this->getEndpoint();
        $httpRequest = $this->httpClient->request(
            'POST',
            $url,
            array(
                'Content-type' => 'application/json',
                'Accept' => 'application/json',
                'Cache-control' => 'no-cache',
                'Authorization' => 'Bearer '  . $this->getAccessToken(),
            ),
            $this->toJSON($data)
        );

        return $this->createResponse(json_decode($httpRequest->getBody()->getContents()));
    }

    public function setExternalReference($value)
    {
        return $this->setParameter('external_reference', $value);
    }

    public function getExternalReference()
    {
        return $this->getParameter('external_reference');
    }

    public function setAccessToken($value)
    {
        return $this->setParameter('access_token', $value);
    }

    public function getAccessToken()
    {
        return $this->getParameter('access_token');
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
    
    public function getCustomer()
    {
        return $this->getParameter('customer');
    }

    public function setCustomer($value)
    {
        return $this->setParameter('customer', $value);
    }

    protected function getEndpoint($endpoint = '')
    {
        return $this->endpoint . $endpoint;
    }

    public function getGrantType()
    {
        return $this->getParameter('grant_type');
    }

    public function setGrantType($value)
    {
        return $this->setParameter('grant_type', $value);
    }

    public function toJSON($data, $options = 0)
    {
        if (version_compare(phpversion(), '5.4.0', '>=') === true) {
            return json_encode($data, $options | 64);
        }
        return str_replace('\\/', '/', json_encode($data, $options));
    }

}

?>
