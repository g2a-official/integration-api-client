<?php
namespace Tests\Response;

use G2A\IntegrationApi\Response\OrderAddResponse;
use GuzzleHttp\Psr7\Response;
use Tests\Request\OrderAddRequestTest;

class OrderAddResponseTest extends ResponseTestCase
{
    /**
     * @coversNothing
     */
    public function setUp()
    {
        $response = new Response(200, [], OrderAddRequestTest::RESPONSE_JSON);
        $this->responseObject = new OrderAddResponse($response);
        $this->responseMock = json_decode(OrderAddRequestTest::RESPONSE_JSON, true);
    }

    /**
     * @coversNothing
     */
    public function testGetOrderId()
    {
        $this->assertEquals($this->responseMock['order_id'], $this->responseObject->getOrderId());
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
