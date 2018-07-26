<?php
namespace G2A\IntegrationApi\Response;

use G2A\IntegrationApi\Model\Product;
use G2A\IntegrationApi\Model\ProductInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ProductsListResponse.
 *
 * @package G2A\IntegrationApi\Response
 */
final class ProductsListResponse extends ResponseAbstract implements ProductsListResponseInterface
{
    /**
     * @var ProductInterface[]
     */
    private $products = [];

    /**
     * ProductsListResponse constructor.
     *
     * @param ResponseInterface $apiResponse
     *
     * @throws \G2A\IntegrationApi\Exception\IntegrationApiException
     */
    public function __construct(ResponseInterface $apiResponse)
    {
        parent::__construct($apiResponse);

        foreach ($this->getParsed()['docs'] as $product) {
            $this->products[] = new Product($product);
        }
    }

    /**
     * @return int|null
     */
    public function getTotal()
    {
        return $this->getValue('total');
    }

    /**
     * @return int|null
     */
    public function getPage()
    {
        return $this->getValue('page');
    }

    /**
     * @return ProductInterface[]
     */
    public function getProducts()
    {
        return $this->products;
    }
}
