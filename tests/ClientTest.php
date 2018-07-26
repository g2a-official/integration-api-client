<?php
namespace Tests;

use G2A\IntegrationApi\Model\Request;

final class ClientTest extends G2ATestCase
{
    public function testGetAuthorization()
    {
        $client = $this->getClient();

        $this->assertEquals(
            self::HEADER_AUTHORIZATION,
            $client->getAuthorization()
        );
    }

    public function testGetUrl()
    {
        $client = $this->getClient();

        $this->assertEquals('v1/products', $client->getUrl(Request::METHOD_GET, '/products'));
        $this->assertEquals('v1/products?qty=4', $client->getUrl(Request::METHOD_GET, '/products', ['qty' => 4]));
        $this->assertEquals('v1/order', $client->getUrl(
            Request::METHOD_POST,
            '/order',
            [
                'product_id' => 10000068865001,
                'currency'   => 'EUR',
                'max_price'  => 1.23,
            ]
        ));
    }

    public function testGetHeaders()
    {
        $headers = [
            'Authorization' => self::HEADER_AUTHORIZATION,
        ];

        $client = $this->getClient();

        // METHOD GET
        $this->assertEquals($headers, $client->getHeaders(Request::METHOD_GET));

        // METHOD POST|PUT
        $headers['Content-Type'] = 'application/json';
        $this->assertEquals($headers, $client->getHeaders(Request::METHOD_POST));
        $this->assertEquals($headers, $client->getHeaders(Request::METHOD_PUT));
    }

    public function testGetBody()
    {
        $json = '{"status":"new","price":41.5,"currency":"EUR"}';

        $array = [
            'status'   => 'new',
            'price'    => 41.5,
            'currency' => 'EUR',
        ];

        $client = $this->getClient();

        $this->assertEquals($json, $client->getBody($array));
        $this->assertEquals('[]', $client->getBody([]));
    }

    public function testSetGetHttpClient()
    {
        $client = $this->getClient();

        $this->assertEquals(self::API_PROTOCOL . '://' . self::API_DOMAIN . '/', $client->getHttpClient()->getConfig('base_uri'));

        $baseUri = 'http://g2a.com';
        $client->setHttpClient(new \GuzzleHttp\Client([
            'base_uri' => $baseUri,
        ]));

        $this->assertInstanceOf(\GuzzleHttp\ClientInterface::class, $client->getHttpClient());
        $this->assertEquals($baseUri, $client->getHttpClient()->getConfig('base_uri'));
    }
}
