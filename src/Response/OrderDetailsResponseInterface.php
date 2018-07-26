<?php
namespace G2A\IntegrationApi\Response;

use G2A\IntegrationApi\ResponseInterface;

/**
 * Interface OrderDetailsResponseInterface.
 *
 * @package G2A\IntegrationApi\Response
 */
interface OrderDetailsResponseInterface extends ResponseInterface
{
    /**
     * @return string|null
     */
    public function getCurrency();

    /**
     * @return float|null
     */
    public function getPrice();

    /**
     * @return string|null
     */
    public function getStatus();
}
