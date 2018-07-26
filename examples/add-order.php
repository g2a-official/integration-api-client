<?php

use G2A\IntegrationApi\Request\OrderAddRequest;
use G2A\IntegrationApi\Request\OrderDetailsRequest;
use G2A\IntegrationApi\Request\OrderKeyRequest;
use G2A\IntegrationApi\Request\OrderPaymentRequest;

require __DIR__ . '/../vendor/autoload.php';
require 'config.php';

try {
    $g2aApiClient = new \G2A\IntegrationApi\Client($config);

    echo 'Environment: ' . API_DOMAIN . PHP_EOL;

    // ==================================================================================

    // add an order
    $request = new OrderAddRequest($g2aApiClient);
    $request
        ->setProductId('10000037846002')
        ->setCurrency('USD')
        ->setMaxPrice(45.12)
        ->call();

    echo 'Creating an order...' . PHP_EOL;
    $addOrderResponse = $request->getResponse();

    echo 'Order ID: ' . $addOrderResponse->getOrderId() . PHP_EOL; // you should store it in your database
    echo 'Price: ' . $addOrderResponse->getPrice() . PHP_EOL;
    echo 'Currency: ' . $addOrderResponse->getCurrency() . PHP_EOL;

    // ==================================================================================

    // pay for an order
    echo 'Paying for an order...' . PHP_EOL;
    $request = new OrderPaymentRequest($g2aApiClient);
    $request
        ->setOrderId($addOrderResponse->getOrderId())
        ->call();

    $payOrderResponse = $request->getResponse();

    // transaction id from G2A PAY - for debug only
    echo 'Payment transaction ID: ' . $payOrderResponse->getTransactionId() . PHP_EOL;
    echo 'Payment status: ' . $payOrderResponse->getStatus() . PHP_EOL;

    // ==================================================================================

    // get order details
    echo 'Receiving order details...' . PHP_EOL;
    $request = new OrderDetailsRequest($g2aApiClient);
    $request
        ->setOrderId($addOrderResponse->getOrderId())
        ->call();

    $orderDetailsResponse = $request->getResponse();

    echo 'Order status: ' . $orderDetailsResponse->getStatus() . PHP_EOL;
    echo 'Price: ' . $orderDetailsResponse->getPrice() . PHP_EOL;
    echo 'Currency: ' . $orderDetailsResponse->getCurrency() . PHP_EOL;

    // ==================================================================================

    // get order key
    echo 'Receiving order key...' . PHP_EOL;
    $request = new OrderKeyRequest($g2aApiClient);
    $request
        ->setOrderId($addOrderResponse->getOrderId())
        ->call();

    $orderDetailsResponse = $request->getResponse();

    echo 'Order key: ' . $orderDetailsResponse->getKey() . PHP_EOL;
} catch (\G2A\IntegrationApi\Exception\Request\ValidatorException $e) {
    echo 'Bad request: ' . $e->getMessage() . PHP_EOL;
} catch (\G2A\IntegrationApi\Exception\Response\BadResponseException $e) {
    echo 'API error: ' . $e->getResponse()->getMessage() . ' (' . $e->getResponse()->getCode() . ')' . PHP_EOL;
} catch (\G2A\IntegrationApi\Exception\IntegrationApiException $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
