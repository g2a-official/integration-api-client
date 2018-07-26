<?php
namespace G2A\IntegrationApi\Exception\Response;

use G2A\IntegrationApi\Exception\IntegrationApiException;
use G2A\IntegrationApi\Response\ErrorResponseInterface;

/**
 * Class BadResponseException.
 *
 * @package G2A\IntegrationApi\Request\Exception
 */
class BadResponseException extends IntegrationApiException
{
    /** @var ErrorResponseInterface */
    private $response;

    /**
     * @param ErrorResponseInterface $response
     *
     * @return $this
     */
    public function setResponse(ErrorResponseInterface $response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * @return ErrorResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }
}
