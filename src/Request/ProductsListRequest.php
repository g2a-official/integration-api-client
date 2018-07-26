<?php
namespace G2A\IntegrationApi\Request;

use G2A\IntegrationApi\Exception\IntegrationApiException;
use G2A\IntegrationApi\Model\Request;
use G2A\IntegrationApi\Response\ErrorResponse;
use G2A\IntegrationApi\Response\ProductsListResponse;
use G2A\IntegrationApi\Response\ProductsListResponseInterface;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

/**
 * @method ProductsListResponse|ErrorResponse getResponse
 */
final class ProductsListRequest extends RequestAbstract implements ProductsListRequestInterface
{
    /**
     * @param int $value
     *
     * @return $this
     */
    public function setPage($value)
    {
        $this->setValue('page', $value);

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPage()
    {
        return $this->getValue('page');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setId($value)
    {
        $this->setValue('id', $value);

        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->getValue('id');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMinQty($value)
    {
        $this->setValue('minQty', $value);

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinQty()
    {
        return $this->getValue('minQty');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setMinPriceFrom($value)
    {
        $this->setValue('minPriceFrom', $value);

        return $this;
    }

    /**
     * @return float|null
     */
    public function getMinPriceFrom()
    {
        return $this->getValue('minPriceFrom');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setMinPriceTo($value)
    {
        $this->setValue('minPriceTo', $value);

        return $this;
    }

    /**
     * @return float|null
     */
    public function getMinPriceTo()
    {
        return $this->getValue('minPriceTo');
    }

    /**
     * @return string
     */
    public function getHttpMethod()
    {
        return Request::METHOD_GET;
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return '/products';
    }

    /**
     * @param PsrResponseInterface $response
     *
     * @return ProductsListResponseInterface
     * @throws IntegrationApiException
     */
    protected function remapResponse(PsrResponseInterface $response)
    {
        return new ProductsListResponse($response);
    }
}
