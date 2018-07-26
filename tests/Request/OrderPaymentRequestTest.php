<?php
namespace Tests\Request;

use G2A\IntegrationApi\Exception\Request\ValidatorException;
use G2A\IntegrationApi\Request\OrderPaymentRequest;
use GuzzleHttp\Psr7\Response;
use Tests\G2ATestCase;

final class OrderPaymentRequestTest extends G2ATestCase
{
    const ORDER_ID = 1531211656;
    const RESPONSE_JSON = '{
        "status": true,
        "transaction_id": "272d3360-fc22-4378-8c8c-34d3602d2182"
    }';

    public function testValidate()
    {
        $this->expectException(ValidatorException::class);

        $apiResponse = new Response(200, [], self::RESPONSE_JSON);
        $client = $this->getClient([$apiResponse]);

        $orderAddRequest = new OrderPaymentRequest(
            $client,
            ['order_id' => 'xxxxx']
        );

        $orderAddRequest->call();
    }

    public function testConstructor()
    {
        $request = new OrderPaymentRequest($this->getClient(), ['order_id' => self::ORDER_ID]);

        $this->assertEquals(self::ORDER_ID, $request->getOrderId());
        $this->assertInternalType('int', $request->getOrderId());
    }

    public function testGetResponse()
    {
        $apiResponse = new Response(200, [], self::RESPONSE_JSON);
        $client = $this->getClient([$apiResponse]);

        $orderAddRequest = new OrderPaymentRequest(
            $client,
            ['order_id' => self::ORDER_ID]
        );

        $orderAddRequest->call();

        $orderAddResponse = json_decode(self::RESPONSE_JSON, true);

        $response = $orderAddRequest->getResponse();
        $this->assertInstanceOf(\G2A\IntegrationApi\Response\OrderPaymentResponse::class, $response);
        $this->assertEquals($orderAddResponse['status'], $response->getStatus());
        $this->assertInternalType('boolean', $response->getStatus());
        $this->assertEquals($orderAddResponse['transaction_id'], $response->getTransactionId());
        $this->assertInternalType('string', $response->getTransactionId());
    }
}
