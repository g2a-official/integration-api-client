<?php
namespace Tests\Request;

use G2A\IntegrationApi\Exception\Request\ValidatorException;
use G2A\IntegrationApi\Request\OrderKeyRequest;
use GuzzleHttp\Psr7\Response;
use Tests\G2ATestCase;

final class OrderKeyRequestTest extends G2ATestCase
{
    const ORDER_ID = 1531211656;
    const RESPONSE_JSON = '{
        "key": "EUIRCQCRRWKYWFVO"
    }';

    public function testValidate()
    {
        $this->expectException(ValidatorException::class);

        $apiResponse = new Response(200, [], self::RESPONSE_JSON);
        $client = $this->getClient([$apiResponse]);

        $orderAddRequest = new OrderKeyRequest(
            $client,
            ['order_id' => 'xxxxx']
        );

        $orderAddRequest->call();
    }

    public function testConstructor()
    {
        $request = new OrderKeyRequest($this->getClient(), ['order_id' => self::ORDER_ID]);

        $this->assertEquals(self::ORDER_ID, $request->getOrderId());
        $this->assertInternalType('int', $request->getOrderId());
    }

    public function testGetResponse()
    {
        $apiResponse = new Response(200, [], self::RESPONSE_JSON);
        $client = $this->getClient([$apiResponse]);

        $orderAddRequest = new OrderKeyRequest(
            $client,
            ['order_id' => self::ORDER_ID]
        );

        $orderAddRequest->call();

        $orderAddResponse = json_decode(self::RESPONSE_JSON, true);

        $response = $orderAddRequest->getResponse();
        $this->assertInstanceOf(\G2A\IntegrationApi\Response\OrderKeyResponse::class, $response);
        $this->assertEquals($orderAddResponse['key'], $response->getKey());
        $this->assertInternalType('string', $response->getKey());
    }
}
