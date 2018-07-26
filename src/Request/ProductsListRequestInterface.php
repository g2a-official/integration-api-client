<?php
namespace G2A\IntegrationApi\Request;

use G2A\IntegrationApi\RequestInterface;

/**
 * Interface ProductsListRequestInterface.
 *
 * @package G2A\IntegrationApi\Request
 */
interface ProductsListRequestInterface extends RequestInterface
{
    /**
     * @param int $value
     *
     * @return $this
     */
    public function setPage($value);

    /**
     * @return int|null
     */
    public function getPage();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setId($value);

    /**
     * @return mixed|null
     */
    public function getId();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMinQty($value);

    /**
     * @return int|null
     */
    public function getMinQty();

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setMinPriceFrom($value);

    /**
     * @return float|null
     */
    public function getMinPriceFrom();

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setMinPriceTo($value);

    /**
     * @return float|null
     */
    public function getMinPriceTo();
}
