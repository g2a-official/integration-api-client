<?php
namespace G2A\IntegrationApi\Response;

/**
 * Class ErrorResponse.
 *
 * @package G2A\IntegrationApi\Response
 */
final class ErrorResponse extends ResponseAbstract implements ErrorResponseInterface
{
    /**
     * @return string
     */
    public function getCode()
    {
        return $this->getValue('code');
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->getValue('message');
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getValue('status');
    }
}
