<?php
namespace G2A\IntegrationApi;

use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

/**
 * Interface ResponseInterface.
 *
 * @package G2A\IntegrationApi
 */
interface ResponseInterface
{
    /**
     * @return PsrResponseInterface
     */
    public function getRaw();

    /**
     * @return array
     */
    public function getParsed();

    /**
     * @param string $key
     *
     * @return mixed|null
     */
    public function getValue($key);
}
