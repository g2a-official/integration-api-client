<?php
namespace G2A\IntegrationApi;

use GuzzleHttp\ClientInterface as GuzzleClientInterface;

interface ClientInterface
{
    /**
     * @return GuzzleClientInterface
     */
    public function getHttpClient();

    /**
     * @param string $method
     * @param string $url
     * @param array  $params
     *
     * @return string
     */
    public function getUrl($method, $url, array $params);

    /**
     * @param string $method
     *
     * @return array
     */
    public function getHeaders($method);

    /**
     * @param array $params
     *
     * @return string
     */
    public function getBody(array $params);

    /**
     * Returns authorization header content based on api hash, email and api secret.
     *
     * @return string
     */
    public function getAuthorization();
}
