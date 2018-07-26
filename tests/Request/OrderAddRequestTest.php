<?php
namespace Tests\Request;

use G2A\IntegrationApi\Exception\Request\ValidatorException;
use G2A\IntegrationApi\Request\OrderAddRequest;
use GuzzleHttp\Psr7\Response;
use Tests\G2ATestCase;

final class OrderAddRequestTest extends G2ATestCase
{
    /** @var string */
    const REQUEST_JSON = '{
        "product_id": "10000084431001",
        "currency": "EUR",
        "max_price": 41.5
    }';

    const RESPONSE_JSON = '{
        "order_id": "1530978476",
        "price": 41.5,
        "currency": "EUR"
    }';

    public function testConstructor()
    {
        $requestData = json_decode(self::REQUEST_JSON, true);
        $orderAddRequest = new OrderAddRequest($this->getClient(), $requestData);

        $this->assertEquals($requestData['product_id'], $orderAddRequest->getProductId());
        $this->assertInternalType('string', $orderAddRequest->getProductId());
        $this->assertEquals($requestData['currency'], $orderAddRequest->getCurrency());
        $this->assertInternalType('string', $orderAddRequest->getCurrency());
        $this->assertEquals($requestData['max_price'], $orderAddRequest->getMaxPrice());
        $this->assertInternalType('float', $orderAddRequest->getMaxPrice());
    }

    public function testGetResponse()
    {
        $apiResponse = new Response(200, [], self::RESPONSE_JSON);
        $client = $this->getClient([$apiResponse]);

        $requestData = json_decode(self::REQUEST_JSON, true);
        $request = new OrderAddRequest($client, $requestData);
        $request->call();

        $responseMock = json_decode(self::RESPONSE_JSON, true);

        $response = $request->getResponse();
        $this->assertEquals($response->getParsed(), $responseMock);
        $this->assertInstanceOf(\Psr\Http\Message\ResponseInterface::class, $response->getRaw());
        $this->assertInstanceOf(\G2A\IntegrationApi\Response\OrderAddResponse::class, $response);
        $this->assertEquals($responseMock['order_id'], $response->getOrderId());
        $this->assertInternalType('string', $response->getOrderId());
        $this->assertEquals($responseMock['currency'], $response->getCurrency());
        $this->assertInternalType('string', $response->getCurrency());
        $this->assertEquals($responseMock['price'], $response->getPrice());
        $this->assertInternalType('float', $response->getPrice());
    }

    public function testSetGetProductId()
    {
        $value = '123123';
        $request = new OrderAddRequest($this->getClient());

        $this->assertEquals(null, $request->getProductId());
        $request->setProductId($value);
        $this->assertEquals($value, $request->getProductId());
    }

    public function testSetGetCurrency()
    {
        $value = 'EUR';
        $request = new OrderAddRequest($this->getClient());

        $this->assertEquals(null, $request->getCurrency());
        $request->setCurrency($value);
        $this->assertEquals($value, $request->getCurrency());
    }

    public function testSetGetMaxPrice()
    {
        $value = 41.5;
        $request = new OrderAddRequest($this->getClient());

        $this->assertEquals(null, $request->getMaxPrice());
        $request->setMaxPrice($value);
        $this->assertEquals($value, $request->getMaxPrice());
    }

    /**
     * Request validators should throw ValidatorException.
     */
    public function testValidationProductId()
    {
        $this->expectException(ValidatorException::class);

        $request = new OrderAddRequest($this->getClient());
        $request
            ->setProductId(10000084431001)
            ->call();
    }

    /**
     * Request validators should throw ValidatorException.
     */
    public function testValidationCurrency()
    {
        $this->expectException(ValidatorException::class);

        $client = $this->getClient();

        $request = new OrderAddRequest($client);
        $request
            ->setProductId('10000084431001')
            ->setCurrency('XX')
            ->call();
    }

    /**
     * Request validators should throw ValidatorException.
     */
    public function testValidationMaxPrice()
    {
        $this->expectException(ValidatorException::class);
        $client = $this->getClient();

        $request = new OrderAddRequest($client);
        $request
            ->setProductId('10000084431001')
            ->setMaxPrice('123')
            ->call();
    }
}
