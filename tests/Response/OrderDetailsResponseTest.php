<?php
namespace Tests\Response;

use G2A\IntegrationApi\Response\OrderDetailsResponse;
use GuzzleHttp\Psr7\Response;
use Tests\Request\OrderDetailsRequestTest;

class OrderDetailsResponseTest extends ResponseTestCase
{
    public function setUp()
    {
        $response = new Response(200, [], OrderDetailsRequestTest::RESPONSE_JSON);
        $this->responseObject = new OrderDetailsResponse($response);
        $this->responseMock = json_decode(OrderDetailsRequestTest::RESPONSE_JSON, true);
    }

    public function testGetStatus()
    {
        $this->assertEquals($this->responseMock['status'], $this->responseObject->getStatus());
    }

    public function testGetCurrency()
    {
        $this->assertEquals($this->responseMock['currency'], $this->responseObject->getCurrency());
    }

    public function testGetPrice()
    {
        $this->assertEquals($this->responseMock['price'], $this->responseObject->getPrice());
    }
}
