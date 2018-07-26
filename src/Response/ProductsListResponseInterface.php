<?php
namespace G2A\IntegrationApi\Response;

use G2A\IntegrationApi\ResponseInterface;

/**
 * Interface ProductsListResponseInterface.
 *
 * @package G2A\IntegrationApi\Response
 */
interface ProductsListResponseInterface extends ResponseInterface
{
    /**
     * @return int|null
     */
    public function getTotal();

    /**
     * @return int|null
     */
    public function getPage();

    /**
     * @return array
     */
    public function getProducts();
}
