<?php
namespace G2A\IntegrationApi\Response;

use G2A\IntegrationApi\ResponseInterface;

/**
 * Interface OrderKeyResponseInterface.
 *
 * @package G2A\IntegrationApi\Response
 */
interface OrderKeyResponseInterface extends ResponseInterface
{
    /**
     * @return string|null
     */
    public function getKey();
}
