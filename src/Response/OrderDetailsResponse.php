<?php
namespace G2A\IntegrationApi\Response;

/**
 * Class OrderDetailsResponse.
 *
 * @package G2A\IntegrationApi\Response
 */
final class OrderDetailsResponse extends ResponseAbstract implements OrderDetailsResponseInterface
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
    public function getStatus()
    {
        return $this->getValue('status');
    }
}
