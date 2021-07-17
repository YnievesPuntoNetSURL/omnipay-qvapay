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
}

?>
