<?php
namespace G2A\IntegrationApi\Request;

use G2A\IntegrationApi\Client;
use G2A\IntegrationApi\ClientInterface;
use G2A\IntegrationApi\Exception\IntegrationApiException;
use G2A\IntegrationApi\Exception\Request\ValidatorException;
use G2A\IntegrationApi\Exception\Response\BadResponseException;
use G2A\IntegrationApi\Exception\Response\EmptyResponseException;
use G2A\IntegrationApi\Exception\Response\InvalidJsonException;
use G2A\IntegrationApi\Model\Request;
use G2A\IntegrationApi\RequestInterface;
use G2A\IntegrationApi\Response\ErrorResponse;
use G2A\IntegrationApi\Response\ErrorResponseInterface;
use G2A\IntegrationApi\ResponseInterface;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

abstract class RequestAbstract implements RequestInterface
{
    /** @var ClientInterface */
    private $client;

    /** @var array */
    private $properties = [];

    /** @var PsrResponseInterface */
    protected $response;

    /** @var ResponseInterface */
    protected $responseTransformed;

    /**
     * RequestAbstract constructor.
     *
     * @param Client $client
     * @param array $properties
     */
    public function __construct(Client $client, array $properties = [])
    {
        $this->client = $client;
        foreach ($properties as $k => $v) {
            $methodName = 'set' . str_replace('_', '', ucwords($k, '_'));
            if (method_exists($this, $methodName)) {
                $this->{$methodName}($v);
            }
        }
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->properties;
    }

    /**
     * @param string $property
     *
     * @return mixed|null
     */
    protected function getValue($property)
    {
        if (isset($this->properties[$property])) {
            return $this->properties[$property];
        }
    }

    /**
     * @param string $property
     * @param string $value
     *
     * @return $this
     */
    protected function setValue($property, $value)
    {
        $this->properties[$property] = $value;

        return $this;
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    protected function isNumeric($value)
    {
        if (null !== $value &&
            (
                true === is_float($value) ||
                true === is_int($value)
            )
        ) {
            return true;
        }

        return false;
    }

    /**
     * @param string $method http method ex. GET, POST, PUT
     * @param string $url url to call ex. v1/order
     *
     * @throws ValidatorException
     * @throws IntegrationApiException
     * @throws BadResponseException
     * @throws \GuzzleHttp\Exception\BadResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send($method, $url)
    {
        $this->validate();

        $options = [
            'headers' => $this->client->getHeaders($method),
        ];

        $params = $this->toArray();

        if (!empty($params)) {
            if (Request::METHOD_GET === $method) {
                $options['query'] = $params;
            } else {
                $options['body'] = $this->client->getBody($params);
            }
        }

        $apiUrl = $this->client->getUrl($method, $url, $params);
        try {
            $this->response = $this->client->getHttpClient()->request($method, $apiUrl, $options);
            $this->responseTransformed = $this->remapResponse($this->response);
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if (!$e->hasResponse() || empty($e->getResponse()->getBody()->getContents())) {
                throw new EmptyResponseException();
            }

            $this->response = $e->getResponse();
            $this->responseTransformed = $this->remapErrorResponse($e->getResponse());

            $badResponseException = new BadResponseException($e->getMessage(), $e->getCode(), $e);
            $badResponseException->setResponse($this->responseTransformed);

            throw $badResponseException;
        }
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->responseTransformed;
    }

    /**
     * @throws \InvalidArgumentException
     * @throws \G2A\IntegrationApi\Exception\IntegrationApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    final public function call()
    {
        $this->send($this->getHttpMethod(), $this->getEndpoint());
    }

    /**
     * @param PsrResponseInterface $response
     *
     * @return ResponseInterface
     */
    abstract protected function remapResponse(PsrResponseInterface $response);

    /**
     * @throws InvalidJsonException
     *
     * @return ErrorResponseInterface
     */
    private function remapErrorResponse(PsrResponseInterface $response)
    {
        return new ErrorResponse($response);
    }

    /**
     * Validate request object before sending.
     *
     * @return void
     */
    public function validate()
    {
    }
}
