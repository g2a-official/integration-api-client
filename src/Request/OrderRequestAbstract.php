<?php
namespace G2A\IntegrationApi\Request;

use G2A\IntegrationApi\Exception\Request\ValidatorException;

/**
 * Class OrderRequestAbstract.
 *
 * @package G2A\IntegrationApi\Request
 */
abstract class OrderRequestAbstract extends RequestAbstract
{
    /** @var int */
    private $orderId;

    /**
     * @return string|null
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setOrderId($value)
    {
        $this->orderId = $value;

        return $this;
    }

    /**
     * @throws ValidatorException
     */
    public function validate()
    {
        if (!is_numeric($this->getOrderId())) {
            throw new ValidatorException('Invalid order id');
        }
    }
}
