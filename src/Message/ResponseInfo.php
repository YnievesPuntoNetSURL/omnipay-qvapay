<?php

namespace Omnipay\QvaPay\Message;

use Omnipay\Common\Message\AbstractResponse;

class ResponseInfo extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data->active);
    }

    public function getInfo()
    {
        return $this->data;
    }
}

?>
