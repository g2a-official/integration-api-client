<?php
namespace G2A\IntegrationApi\Response;

/**
 * Class OrderPaymentResponse.
 *
 * @package G2A\IntegrationApi\Response
 */
final class OrderPaymentResponse extends ResponseAbstract implements OrderPaymentResponseInterface
{
    /**
     * @return string|null
     */
    public function getStatus()
    {
        return $this->getValue('status');
    }

    /**
     * @return string|null
     */
    public function getTransactionId()
    {
        return $this->getValue('transaction_id');
    }
}
