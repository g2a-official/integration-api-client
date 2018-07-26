<?php
namespace G2A\IntegrationApi\Response;

/**
 * Class OrderKeyResponse.
 *
 * @package G2A\IntegrationApi\Response
 */
final class OrderKeyResponse extends ResponseAbstract implements OrderKeyResponseInterface
{
    /**
     * @return string|null
     */
    public function getKey()
    {
        return $this->getValue('key');
    }
}
