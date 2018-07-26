<?php
namespace G2A\IntegrationApi\Response;

use G2A\IntegrationApi\ResponseInterface;

/**
 * Interface OrderPaymentResponseInterface.
 *
 * @package G2A\IntegrationApi\Response
 */
interface OrderPaymentResponseInterface extends ResponseInterface
{
    /**
     * @return string|null
     */
    public function getStatus();

    /**
     * @return string|null
     */
    public function getTransactionId();
}
