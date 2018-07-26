<?php
namespace Tests\Response;

use G2A\IntegrationApi\Response\OrderPaymentResponse;
use GuzzleHttp\Psr7\Response;
use Tests\Request\OrderPaymentRequestTest;

class OrderPaymentResponseTest extends ResponseTestCase
{
    public function setUp()
    {
        $response = new Response(200, [], OrderPaymentRequestTest::RESPONSE_JSON);
        $this->responseObject = new OrderPaymentResponse($response);
        $this->responseMock = json_decode(OrderPaymentRequestTest::RESPONSE_JSON, true);
    }

    public function testGetStatus()
    {
        $this->assertEquals($this->responseMock['status'], $this->responseObject->getStatus());
    }

    public function testGetTransactionId()
    {
        $this->assertEquals($this->responseMock['transaction_id'], $this->responseObject->getTransactionId());
    }
}
