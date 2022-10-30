<?php

namespace Omnipay\QvaPay;

use Omnipay\Tests\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{
    public function setUp(): void
    {
        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());
        $this->gateway->setAppID(getenv('APP_ID'));
        $this->gateway->setAppSecret(getenv('APP_SECRET'));
        $this->gateway->setTestMode(TRUE);
    }

    public function testInfo(): void
    {
        $responseInfo = $this->gateway
                             ->requestInfo()
                             ->send();
        $this->assertFalse($responseInfo->isSuccessful());
        $this->assertInstanceOf('\Omnipay\QvaPay\Message\ResponseInfo', $responseInfo);
    }

    public function testPurchase(): void
    {
        $responseInfo = $this->gateway
                             ->purchase()
                             ->setAmount(5)
                             ->setDescription("Test Invoice")
                             ->setRemoteId("TEST0001")
                             ->setSigned(1)
                             ->send();
        $this->assertFalse($responseInfo->isSuccessful());
        $this->assertInstanceOf('\Omnipay\QvaPay\Message\ResponseCreateInvoice', $responseInfo);
    }

}

?>
