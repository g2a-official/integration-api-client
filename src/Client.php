<?php
namespace G2A\IntegrationApi;

use G2A\IntegrationApi\Model\Config;
use G2A\IntegrationApi\Model\Request;

class Client implements ClientInterface
{
    /** @var ClientInterface */
    private $httpClient;

    /** @var Config */
    private $config;

    /**
     * Client constructor.
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Returns authorization header content based on api hash, email and api secret.
     *
     * @return string
     */
    public function getAuthorization()
    {
        $hash = hash('sha256', $this->config->getApiHash() . $this->config->getEmail() . $this->config->getApiSecret());

        return $this->config->getApiHash() . ', ' . $hash;
    }

    /**
     * @param string $method
     * @param string $url
     * @param array  $params
     *
     * @return string
     */
    public function getUrl($method, $url, array $params = [])
    {
        $apiUrl = rtrim($this->config->getApiVersion(), '/') . '/' . ltrim($url, '/');
        if (Request::METHOD_GET === $method && !empty($params)) {
            $apiUrl .= '?' . http_build_query($params);
        }

        return $apiUrl;
    }

    /**
     * @param string $method
     *
     * @return array
     */
    public function getHeaders($method)
    {
        $headers = ['Authorization' => $this->getAuthorization()];
        if (in_array($method, [Request::METHOD_POST, Request::METHOD_PUT])) {
            $headers['Content-Type'] = 'application/json';
        }

        return $headers;
    }

    /**
     * @param array $params
     *
     * @return string
     */
    public function getBody(array $params)
    {
        return \json_encode($params, JSON_PARTIAL_OUTPUT_ON_ERROR);
    }

    /**
     * @param \GuzzleHttp\ClientInterface $httpClient
     */
    public function setHttpClient(\GuzzleHttp\ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return \GuzzleHttp\ClientInterface
     */
    public function getHttpClient()
    {
        if (null === $this->httpClient) {
            $this->httpClient = new \GuzzleHttp\Client([
                'base_uri' => $this->config->getApiProtocol() . '://' . $this->config->getApiDomain() . '/',
            ]);
        }

        return $this->httpClient;
    }
}
