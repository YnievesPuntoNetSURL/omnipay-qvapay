<?php

namespace Omnipay\QvaPay\Message;

use Omnipay\Common\Message\AbstractResponse;

class ResponseTransaction extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data);
    }

    public function getTransactions()
    {
        return $this->data;
    }
}

?>
