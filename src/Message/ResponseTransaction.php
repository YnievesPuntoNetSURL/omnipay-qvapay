<?php

namespace Omnipay\QvaPay\Message;

use Omnipay\Common\Message\AbstractResponse;

class ResponseTransaction extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data);
    }

    public function getTransaction()
    {
        return $this->data;
    }
}

?>
