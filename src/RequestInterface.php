<?php
namespace G2A\IntegrationApi;

use Psr\Http\Message\ResponseInterface;

/**
 * Interface RequestInterface.
 *
 * @package G2A\IntegrationApi
 */
interface RequestInterface
{
    /**
     * @param string $method
     * @param string $url
     */
    public function send($method, $url);

    /**
     * @return array
     */
    public function toArray();

    /**
     * Perform call to api.
     */
    public function call();

    /**
     * @return ResponseInterface
     */
    public function getResponse();

    /**
     * @return null
     */
    public function validate();

    /**
     * Http method that is used to performs request.
     *
     * @return string
     */
    public function getHttpMethod();

    /**
     * Endpoint to request api.
     *
     * @return string
     */
    public function getEndpoint();
}
