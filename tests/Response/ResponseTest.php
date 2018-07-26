<?php
namespace Tests\Response;

use G2A\IntegrationApi\Exception\Response\BadResponseException;
use G2A\IntegrationApi\Exception\Response\EmptyResponseException;
use G2A\IntegrationApi\Exception\Response\InvalidJsonException;
use G2A\IntegrationApi\Request\OrderAddRequest;
use G2A\IntegrationApi\Response\ErrorResponseInterface;
use GuzzleHttp\Psr7\Response;

class ResponseTest extends ResponseTestCase
{
    const RESPONSE_ERROR_JSON = '{
        "status": "ERROR",
        "message": "Product ID is not valid",
        "code": "BR04"
    }';

    /**
     * Any response that is not JSON will throw InvalidJsonException.
     */
    public function testInvalidJsonException()
    {
        $this->expectException(InvalidJsonException::class);

        $response = new Response(200, [], '{Any Incorrect JSON');
        $client = $this->getClient([$response]);

        $request = new OrderAddRequest($client);
        $request
            ->setProductId('10000084431001')
            ->call();
    }

    /**
     * Http error w/o body will throw EmptyResponseException.
     */
    public function testEmptyBody()
    {
        $this->expectException(EmptyResponseException::class);

        $apiResponse = new Response(502);
        $client = $this->getClient([$apiResponse]);

        $request = new OrderAddRequest($client);
        $request->setProductId('10000084431001')->call();
    }

    /**
     * Http error with json response will throw IntegrationApiException with response ErrorResponseInterface.
     */
    public function testBadResponseException()
    {
        $this->expectException(BadResponseException::class);

        $response = new Response(400, [], self::RESPONSE_ERROR_JSON);
        $client = $this->getClient([$response]);

        $request = new OrderAddRequest($client);
        $request->setProductId('10000084431001')->call();
    }

    /**
     * Http error with json response will throw IntegrationApiException with response ErrorResponseInterface.
     */
    public function testErrorResponse()
    {
        $response = new Response(500, [], self::RESPONSE_ERROR_JSON);
        $client = $this->getClient([$response]);

        try {
            $request = new OrderAddRequest($client);
            $request->setProductId('10000084431001')->call();
        } catch (BadResponseException $e) {
            $this->assertInstanceOf(ErrorResponseInterface::class, $e->getResponse());
            $this->assertEquals('Product ID is not valid', $e->getResponse()->getMessage());
            $this->assertEquals('ERROR', $e->getResponse()->getStatus());
            $this->assertEquals('BR04', $e->getResponse()->getCode());
        }
    }
}
