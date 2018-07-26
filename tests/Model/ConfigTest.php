<?php

use G2A\IntegrationApi\Exception\Model\InvalidConfigException;

final class ConfigTest extends \Tests\G2ATestCase
{
    public function testConstructor()
    {
        $config = new \G2A\IntegrationApi\Model\Config(
            self::EMAIL,
            self::API_DOMAIN,
            self::API_HASH,
            self::API_SECRET,
            self::API_PROTOCOL,
            self::API_VERSION
        );

        $this->assertEquals(self::EMAIL, $config->getEmail());
        $this->assertEquals(self::API_PROTOCOL, $config->getApiProtocol());
        $this->assertEquals(self::API_DOMAIN, $config->getApiDomain());
        $this->assertEquals(self::API_VERSION, $config->getApiVersion());
        $this->assertEquals(self::API_HASH, $config->getApiHash());
        $this->assertEquals(self::API_SECRET, $config->getApiSecret());
    }

    public function testEmptyEmail()
    {
        $this->expectException(InvalidConfigException::class);
        new \G2A\IntegrationApi\Model\Config('', 'test123', 'test123', 'test123');
    }

    public function testEmptyProtocol()
    {
        $this->expectException(InvalidConfigException::class);
        new \G2A\IntegrationApi\Model\Config('test123', '', 'test123', 'test123');
    }

    public function testEmptyHash()
    {
        $this->expectException(InvalidConfigException::class);
        new \G2A\IntegrationApi\Model\Config('test123', 'test123', '', 'test123');
    }

    public function testEmptySecret()
    {
        $this->expectException(InvalidConfigException::class);
        new \G2A\IntegrationApi\Model\Config('test123', 'test123', 'test123', '');
    }
}
