# PHP client for Integration API of G2A.COM

Client library allows to integrate with [G2A.COM Integration API](https://www.g2a.com/integration-api/)
<br />Web site: https://www.g2a.com/integration-api/

## Documentation
Go to [https://www.g2a.com/integration-api/documentation/](https://www.g2a.com/integration-api/documentation/)

## Requirements

* [PHP 5.5.0 or higher](http://www.php.net/)
* [Composer](https://getcomposer.org/)

## Installation

Package is published on [Packagist](https://packagist.org/packages/g2a/integration-api-client)

Add project dependency:

    composer require g2a/integration-api-client

## Usage

### Creating API client

```php
<?php

require __DIR__ . '/../vendor/autoload.php';

$config = new \G2A\IntegrationApi\Model\Config(
    'sandboxapitest@g2a.com',
    'sandboxapi.g2a.com',
    'qdaiciDiyMaTjxMt',
    'b0d293f6-e1d2-4629-8264-fd63b5af3207b0d293f6-e1d2-4629-8264-fd63b5af3207'
);

$g2aApiClient = new \G2A\IntegrationApi\Client($config);
```
`
### Basic Example

```php
<?php

require __DIR__ . '/../vendor/autoload.php';

$config = new \G2A\IntegrationApi\Model\Config(
    'sandboxapitest@g2a.com',
    'sandboxapi.g2a.com',
    'qdaiciDiyMaTjxMt',
    'b0d293f6-e1d2-4629-8264-fd63b5af3207b0d293f6-e1d2-4629-8264-fd63b5af3207'
);
    
$g2aApiClient = new \G2A\IntegrationApi\Client($config);

// add an order
$request = new G2A\IntegrationApi\Request\OrderAddRequest($g2aApiClient);
$request
    ->setProductId('10000037846002')
    ->setCurrency('USD')
    ->setMaxPrice(45.12)
    ->call();

$response = $request->getResponse();

echo 'Order ID: ' . $response->getOrderId() . PHP_EOL;
````

See `examples` directory for more use cases

### Get products

```php
<?php
// …
$request = new \G2A\IntegrationApi\Request\ProductsListRequest($g2aApiClient);
$request
    ->setPage(1)
    ->setMinQty(5)
    ->call();

$response = $request->getResponse();

foreach ($response->getProducts() as $product) {
    echo $product->getId() . ' ' . $product->getName() . PHP_EOL;
}
```

### Add an order

```php
<?php
// …
$request = new G2A\IntegrationApi\Request\OrderAddRequest($g2aApiClient);
$request
    ->setProductId('10000037846002')
    ->setCurrency('USD')
    ->setMaxPrice(45.12)
    ->call();

$response = $request->getResponse();

echo 'Order ID: ' . $response->getOrderId() . PHP_EOL;
```

### Pay for rder

```php
<?php
// …
$request = new G2A\IntegrationApi\Request\OrderPaymentRequest($g2aApiClient);
$request
    ->setOrderId(1532096834)
    ->call();

$response = $request->getResponse();

echo 'Payment transaction ID: ' . $response->getTransactionId() . PHP_EOL;
echo 'Payment status: ' . $response->getStatus() . PHP_EOL;
```

### Get order details

```php
<?php
// …
$request = new \G2A\IntegrationApi\Request\OrderDetailsRequest($g2aApiClient);
$request
    ->setOrderId(1532096834)
    ->call();

$response = $request->getResponse();

echo 'Order status: ' . $response->getStatus() . PHP_EOL;
echo 'Price: ' . $response->getPrice() . PHP_EOL;
echo 'Currency: ' . $response->getCurrency() . PHP_EOL;
```

### Get order key

```php
<?php
// …
$request = new \G2A\IntegrationApi\Request\OrderKeyRequest($g2aApiClient);
$request
    ->setOrderId(1532096834)
    ->call();

$response = $request->getResponse();

echo 'Order key: ' . $response->getKey() . PHP_EOL;
```

### Sandbox credentials

API Hash: `qdaiciDiyMaTjxMt`  
API Key: `74026b3dc2c6db6a30a73e71cdb138b1e1b5eb7a97ced46689e2d28db1050875`

## Commands

### Code quality

Execute PHPUnit tests

    make test

### Code style
Requires PHP for CLI installed. Execute in root directory

    make csfixer

### Run examples

The following command will send example requests to sandbox environment

    make run-examples

### License
PHP client for Integration API of G2A.COM is released under the [MIT license](https://opensource.org/licenses/MIT)

### Support
Contact us on [G2A Support Hub](https://supporthub.g2a.com/marketplace/)
