<?php
namespace Tests\Response;

use G2A\IntegrationApi\Model\Product;
use G2A\IntegrationApi\Response\ProductsListResponse;
use GuzzleHttp\Psr7\Response;
use Tests\Request\ProductsListRequestTest;

class ProductsListResponseTest extends ResponseTestCase
{
    public function setUp()
    {
        $response = new Response(200, [], ProductsListRequestTest::RESPONSE_JSON);
        $this->responseObject = new ProductsListResponse($response);
        $this->responseMock = json_decode(ProductsListRequestTest::RESPONSE_JSON, true);
    }

    public function testGetTotal()
    {
        $this->assertEquals($this->responseMock['total'], $this->responseObject->getTotal());
    }

    public function testGetPage()
    {
        $this->assertEquals($this->responseMock['page'], $this->responseObject->getPage());
    }

    public function testGetProducts()
    {
        $expectedProducts = [];
        foreach ($this->responseMock['docs'] as $product) {
            $expectedProducts[] = new Product($product);
        }

        $this->assertEquals($expectedProducts, $this->responseObject->getProducts());
    }
}
