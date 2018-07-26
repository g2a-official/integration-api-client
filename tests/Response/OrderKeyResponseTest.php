<?php
namespace Tests\Response;

use G2A\IntegrationApi\Response\OrderKeyResponse;
use GuzzleHttp\Psr7\Response;
use Tests\Request\OrderKeyRequestTest;

class OrderKeyResponseTest extends ResponseTestCase
{
    public function setUp()
    {
        $response = new Response(200, [], OrderKeyRequestTest::RESPONSE_JSON);
        $this->responseObject = new OrderKeyResponse($response);
        $this->responseMock = json_decode(OrderKeyRequestTest::RESPONSE_JSON, true);
    }

    public function testGetKey()
    {
        $this->assertEquals($this->responseMock['key'], $this->responseObject->getKey());
    }
}
