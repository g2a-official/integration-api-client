<?php
namespace G2A\IntegrationApi\Request;

use G2A\IntegrationApi\Exception\Response\InvalidJsonException;
use G2A\IntegrationApi\Model\Request;
use G2A\IntegrationApi\Response\ErrorResponse;
use G2A\IntegrationApi\Response\OrderKeyResponse;
use G2A\IntegrationApi\Response\OrderKeyResponseInterface;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

/**
 * @method OrderKeyResponse|ErrorResponse getResponse
 */
final class OrderKeyRequest extends OrderRequestAbstract
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
        return '/order/key/' . $this->getOrderId();
    }

    /**
     * @param PsrResponseInterface $response
     *
     * @throws InvalidJsonException
     *
     * @return OrderKeyResponseInterface
     */
    protected function remapResponse(PsrResponseInterface $response)
    {
        return new OrderKeyResponse($response);
    }
}
