<?php
namespace Tests\Response;

use G2A\IntegrationApi\ResponseInterface;
use Tests\G2ATestCase;

abstract class ResponseTestCase extends G2ATestCase
{
    /**
     * Transformed response.
     *
     * @var ResponseInterface
     */
    protected $responseObject;

    /**
     * Mocked response as array.
     *
     * @var array
     */
    protected $responseMock = [];
}
