<?php

namespace Omnipay\QvaPay;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\ItemBag;

class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'QvaPay';
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

    public function setAccessToken($value)
    {
        return $this->setParameter('access_token', $value);
    }

    public function getAccessToken()
    {
        return $this->getParameter('access_token');
    }

    public function setExternalReference($value)
    {
        return $this->setParameter('external_reference', $value);
    }

    public function getExternalReference()
    {
        return $this->getParameter('external_reference');
    }
    
    public function requestInfo(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\QvaPay\Message\RequestInfo', $parameters);
    }

    public function requestBalance(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\QvaPay\Message\RequestBalance', $parameters);
    }

    public function requestTransactions(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\QvaPay\Message\RequestTransactions', $parameters);
    }

    public function requestTransaction(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\QvaPay\Message\RequestTransaction', $parameters);
    }

    public function requestCreateInvoice(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\QvaPay\Message\RequestCreateInvoice', $parameters);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\QvaPay\Message\RequestCreateInvoice', $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\QvaPay\Message\RequestCreateInvoice', $parameters);
    }
}
?>
