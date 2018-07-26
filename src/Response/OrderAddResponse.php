<?php
namespace G2A\IntegrationApi\Response;

/**
 * Class OrderAddResponse.
 *
 * @package G2A\IntegrationApi\Response
 */
final class OrderAddResponse extends ResponseAbstract implements OrderAddResponseInterface
{
    /**
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->getValue('currency');
    }

    /**
     * @return float|null
     */
    public function getPrice()
    {
        return $this->getValue('price');
    }

    /**
     * @return string|null
     */
    public function getOrderId()
    {
        return $this->getValue('order_id');
    }
}
