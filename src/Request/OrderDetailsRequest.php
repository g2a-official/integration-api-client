<?php
namespace G2A\IntegrationApi\Request;

use G2A\IntegrationApi\Exception\Response\InvalidJsonException;
use G2A\IntegrationApi\Model\Request;
use G2A\IntegrationApi\Response\ErrorResponse;
use G2A\IntegrationApi\Response\OrderDetailsResponse;
use G2A\IntegrationApi\Response\OrderDetailsResponseInterface;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

/**
 * @method OrderDetailsResponse|ErrorResponse getResponse
 */
final class OrderDetailsRequest extends OrderRequestAbstract
{
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
        return '/order/details/' . $this->getOrderId();
    }

    /**
     * @param PsrResponseInterface $response
     *
     * @throws InvalidJsonException
     *
     * @return OrderDetailsResponseInterface
     */
    protected function remapResponse(PsrResponseInterface $response)
    {
        return new OrderDetailsResponse($response);
    }
}
