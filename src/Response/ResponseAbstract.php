<?php
namespace G2A\IntegrationApi\Response;

use G2A\IntegrationApi\Exception\Response\InvalidJsonException;
use G2A\IntegrationApi\ResponseInterface;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

/**
 * Class ResponseAbstract.
 *
 * @package G2A\IntegrationApi\Response
 */
abstract class ResponseAbstract implements ResponseInterface
{
    const STATUS_OK = 200;
    const STATUS_CREATED = 201;

    /**
     * @var \GuzzleHttp\Psr7\Response
     */
    private $apiResponse;

    /**
     * @var array
     */
    private $apiResponseParsed;

    /**
     * Base constructor.
     *
     * @param \Psr\Http\Message\ResponseInterface $apiResponse
     *
     * @throws InvalidJsonException
     */
    public function __construct(\Psr\Http\Message\ResponseInterface $apiResponse)
    {
        $this->apiResponse = $apiResponse;
        try {
            $this->apiResponseParsed = $this->parseJson();
        } catch (\InvalidArgumentException $e) {
            throw new InvalidJsonException($e->getMessage());
        }
    }

    /**
     * @return PsrResponseInterface
     */
    public function getRaw()
    {
        return $this->apiResponse;
    }

    /**
     * @return array
     */
    public function getParsed()
    {
        return $this->apiResponseParsed;
    }

    /**
     * @param string $key
     *
     * @return mixed|null
     */
    public function getValue($key)
    {
        return !empty($this->apiResponseParsed[$key]) ? $this->apiResponseParsed[$key] : null;
    }

    /**
     * Parsing response body and assign to self::apiResponseParsed.
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    protected function parseJson()
    {
        return \GuzzleHttp\json_decode($this->apiResponse->getBody(), true);
    }
}
