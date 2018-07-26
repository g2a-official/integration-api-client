<?php

use G2A\IntegrationApi\Request\ProductsListRequest;

require __DIR__ . '/../vendor/autoload.php';
require 'config.php';

try {
    $g2aApiClient = new \G2A\IntegrationApi\Client($config);

    echo 'Environment: ' . API_DOMAIN . PHP_EOL;

    $request = new ProductsListRequest($g2aApiClient);
    $request
        ->setPage(1)
        ->setMinQty(5)
        ->call();

    $productsResponse = $request->getResponse();

    foreach ($productsResponse->getProducts() as $product) {
        echo $product->getId() . ' ' . $product->getName() . PHP_EOL;
    }
} catch (\G2A\IntegrationApi\Exception\Request\ValidatorException $e) {
    echo 'Bad request: ' . $e->getMessage() . PHP_EOL;
} catch (\G2A\IntegrationApi\Exception\Response\BadResponseException $e) {
    echo 'API error: ' . $e->getResponse()->getMessage() . ' (' . $e->getResponse()->getCode() . ')' . PHP_EOL;
} catch (\G2A\IntegrationApi\Exception\IntegrationApiException $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
