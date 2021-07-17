<?php

namespace Omnipay\QvaPay\Message;

use Omnipay\Common\Message\AbstractResponse;

class ResponseBalance extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data);
    }

    public function getBalance()
    {
        return $this->data;
    }
}

?>
