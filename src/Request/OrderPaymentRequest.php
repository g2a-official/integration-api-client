<?php
namespace G2A\IntegrationApi\Request;

use G2A\IntegrationApi\Exception\Response\InvalidJsonException;
use G2A\IntegrationApi\Model\Request;
use G2A\IntegrationApi\Response\ErrorResponse;
use G2A\IntegrationApi\Response\OrderPaymentResponse;
use G2A\IntegrationApi\Response\OrderPaymentResponseInterface;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

/**
 * @method OrderPaymentResponse|ErrorResponse getResponse
 */
final class OrderPaymentRequest extends OrderRequestAbstract
{
    /**
     * @return string
     */
    public function getHttpMethod()
    {
        return Request::METHOD_PUT;
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return '/order/pay/' . $this->getOrderId();
    }

    /**
     * @param PsrResponseInterface $response
     *
     * @return OrderPaymentResponseInterface
     * @throws InvalidJsonException
     */
    protected function remapResponse(PsrResponseInterface $response)
    {
        return new OrderPaymentResponse($response);
    }
}
