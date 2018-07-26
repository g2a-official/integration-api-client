<?php
namespace G2A\IntegrationApi\Response;

use G2A\IntegrationApi\ResponseInterface;

/**
 * Class ErrorResponse.
 *
 * @package G2A\IntegrationApi\Response
 */
interface ErrorResponseInterface extends ResponseInterface
{
    /**
     * @return string
     */
    public function getStatus();

    /**
     * @return string
     */
    public function getMessage();

    /**
     * @see https://www.g2a.com/integration-api/documentation/#api-_footer
     *
     * @return string
     */
    public function getCode();
}
