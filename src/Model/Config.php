<?php
namespace G2A\IntegrationApi\Model;

use G2A\IntegrationApi\Exception\Model\InvalidConfigException;

/**
 * Class Config.
 *
 * @package G2A\IntegrationApi\Model
 */
final class Config
{
    /** @var string */
    private $email;

    /** @var string */
    private $apiProtocol = 'https';

    /** @var string */
    private $apiDomain;

    /** @var string */
    private $apiVersion = 'v1';

    /** @var string */
    private $apiHash;

    /** @var string */
    private $apiSecret;

    /**
     * Config constructor.
     *
     * @param string $email
     * @param string $domain
     * @param string $hash
     * @param string $secret
     * @param null|string $httpProtocol
     * @param null|string $version
     *
     * @throws InvalidConfigException
     */
    public function __construct($email, $domain, $hash, $secret, $httpProtocol = null, $version = null)
    {
        if (empty($email)) {
            throw new InvalidConfigException('Email is required');
        }

        if (empty($domain)) {
            throw new InvalidConfigException('Domain is required');
        }

        if (empty($hash)) {
            throw new InvalidConfigException('Hash is required');
        }

        if (empty($secret)) {
            throw new InvalidConfigException('Secret is required');
        }

        $this->email = $email;
        $this->apiDomain = $domain;
        $this->apiHash = $hash;
        $this->apiSecret = $secret;
        if (null !== $httpProtocol) {
            $this->apiProtocol = $httpProtocol;
        }

        if (null !== $version) {
            $this->apiVersion = $version;
        }
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getApiDomain()
    {
        return $this->apiDomain;
    }

    /**
     * @return string
     */
    public function getApiHash()
    {
        return $this->apiHash;
    }

    /**
     * @return string
     */
    public function getApiSecret()
    {
        return $this->apiSecret;
    }

    /**
     * @return string
     */
    public function getApiVersion()
    {
        return $this->apiVersion;
    }

    /**
     * @return string
     */
    public function getApiProtocol()
    {
        return $this->apiProtocol;
    }
}
