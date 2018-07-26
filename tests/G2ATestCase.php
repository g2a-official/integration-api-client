<?php
namespace Tests;

use G2A\IntegrationApi\Client;
use G2A\IntegrationApi\Exception\InvalidArgumentException;
use G2A\IntegrationApi\Model\Config;

abstract class G2ATestCase extends \PHPUnit\Framework\TestCase
{
    const API_PROTOCOL = 'https';
    const API_DOMAIN = 'api.integration-api.g2a';
    const EMAIL = 'test123@integration-api.g2a';
    const API_HASH = 'games-games-games';
    const API_SECRET = 'quite-nice-secret';
    const API_VERSION = 'v1';

    const HEADER_AUTHORIZATION = 'games-games-games, 5feaefae655d6d2dcfb27f22e700495aa90e255fc0ad93bc22dfc0ed770fae21';

    /** @var \G2A\IntegrationApi\Client */
    protected $client;

    /** @var Config */
    protected $config;

    /**
     * OrderAddRequestTest constructor.
     */
    public function setUp()
    {
        $this->client = $this->getClient();
        $this->config = new Config(
            self::EMAIL,
            self::API_DOMAIN,
            self::API_HASH,
            self::API_SECRET,
            self::API_PROTOCOL,
            self::API_VERSION
        );
    }

    /**
     * @param array $responses First argument to \GuzzleHttp\Handler\MockHandler
     *
     * @see https://github.com/guzzle/guzzle/blob/master/docs/testing.rst
     *
     * @throws InvalidArgumentException
     *
     * @return Client
     */
    protected function getClient(array $responses = [])
    {
        $config = new Config(self::EMAIL, self::API_DOMAIN, self::API_HASH, self::API_SECRET);
        $client = new Client($config);

        if (!empty($responses)) {
            $handler = \GuzzleHttp\HandlerStack::create(new \GuzzleHttp\Handler\MockHandler($responses));
            $client->setHttpClient(new \GuzzleHttp\Client([
                'base_uri' => self::API_PROTOCOL . '://' . self::API_DOMAIN . '/',
                'handler'  => $handler,
            ]));
        }

        return $client;
    }
}
