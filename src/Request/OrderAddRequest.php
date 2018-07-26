<?php
namespace G2A\IntegrationApi\Request;

use G2A\IntegrationApi\Exception\Request\ValidatorException;
use G2A\IntegrationApi\Exception\Response\InvalidJsonException;
use G2A\IntegrationApi\Model\Request;
use G2A\IntegrationApi\Response\ErrorResponse;
use G2A\IntegrationApi\Response\OrderAddResponse;
use G2A\IntegrationApi\Response\OrderAddResponseInterface;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

/**
 * @method OrderAddResponse|ErrorResponse getResponse
 */
final class OrderAddRequest extends RequestAbstract
{
    /**
     * @return mixed|null
     */
    public function getProductId()
    {
        return $this->getValue('product_id');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setProductId($value)
    {
        $this->setValue('product_id', $value);

        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getCurrency()
    {
        return $this->getValue('currency');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCurrency($value)
    {
        $this->setValue('currency', $value);

        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getMaxPrice()
    {
        return $this->getValue('max_price');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setMaxPrice($value)
    {
        $this->setValue('max_price', $value);

        return $this;
    }

    /**
     * @return string
     */
    public function getHttpMethod()
    {
        return Request::METHOD_POST;
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return '/order';
    }

    /**
     * @param PsrResponseInterface $response
     *
     * @throws InvalidJsonException
     *
     * @return OrderAddResponseInterface
     */
    protected function remapResponse(PsrResponseInterface $response)
    {
        return new OrderAddResponse($response);
    }

    /**
     * @throws ValidatorException
     */
    public function validate()
    {
        if (!is_string($this->getProductId()) || empty($this->getProductId())) {
            throw new ValidatorException('"product_id" cannot be empty and must be of the string type');
        }

        if (null !== $this->getCurrency() && 3 != strlen($this->getCurrency())) {
            throw new ValidatorException('"currency" must consist of 3 characters and be of the string type');
        }

        if (null !== $this->getMaxPrice() && false === $this->isNumeric($this->getMaxPrice())) {
            $type = gettype($this->getMaxPrice());
            throw new ValidatorException(sprintf('"max_price" must be of the numeric type, %s passed', $type));
        }
    }
}
