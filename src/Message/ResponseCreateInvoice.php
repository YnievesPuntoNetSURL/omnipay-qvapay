<?php

namespace Omnipay\QvaPay\Message;

use Omnipay\Common\Message\AbstractResponse;

class ResponseCreateInvoice extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data->active);
    }

    public function getInvoice()
    {
        return $this->data;
    }

    public function getRedirectMethod()
    {
        return 'GET';
    }

    public function isRedirect()
    {
        return isset($this->data->signedUrl);
    }

    public function getRedirectUrl()
    {
        if ($this->isRedirect()) {
            return $this->data->signedUrl;
        }

        return null;
    }
}

?>
