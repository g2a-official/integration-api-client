<?php
namespace Tests\Request;

use G2A\IntegrationApi\Exception\Request\ValidatorException;
use G2A\IntegrationApi\Request\OrderDetailsRequest;
use GuzzleHttp\Psr7\Response;
use Tests\G2ATestCase;

final class OrderDetailsRequestTest extends G2ATestCase
{
    const ORDER_ID = 1531211656;
    const RESPONSE_JSON = '{
        "status": "new",
        "price": 41.5,
        "currency": "EUR"
    }';

    public function testValidate()
    {
        $this->expectException(ValidatorException::class);

        $apiResponse = new Response(200, [], self::RESPONSE_JSON);
        $client = $this->getClient([$apiResponse]);

        $orderAddRequest = new OrderDetailsRequest($client);
        $orderAddRequest
            ->setOrderId('xxxxx')
            ->call();
    }

    public function testConstructor()
    {
        $request = new OrderDetailsRequest($this->getClient());
        $request->setOrderId(self::ORDER_ID);

        $this->assertEquals(self::ORDER_ID, $request->getOrderId());
        $this->assertInternalType('int', $request->getOrderId());
    }

    public function testGetResponse()
    {
        $apiResponse = new Response(200, [], self::RESPONSE_JSON);
        $client = $this->getClient([$apiResponse]);

        $request = new OrderDetailsRequest($client);
        $request
            ->setOrderId(self::ORDER_ID)
            ->call();

        $responseMock = json_decode(self::RESPONSE_JSON, true);

        $response = $request->getResponse();
        $this->assertInstanceOf(\G2A\IntegrationApi\Response\OrderDetailsResponse::class, $response);
        $this->assertEquals($responseMock['status'], $response->getStatus());
        $this->assertInternalType('string', $response->getStatus());
        $this->assertEquals($responseMock['price'], $response->getPrice());
        $this->assertInternalType('float', $response->getPrice());
        $this->assertEquals($responseMock['currency'], $response->getCurrency());
        $this->assertInternalType('string', $response->getCurrency());
    }
}
