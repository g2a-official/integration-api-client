test:
	./vendor/bin/phpunit --bootstrap vendor/autoload.php tests

csfixer:
	./vendor/friendsofphp/php-cs-fixer/php-cs-fixer --using-cache=no --config=.php_cs fix .

tests-coverage:
	./vendor/bin/phpunit --configuration tests/phpunit.xml --coverage-html tests/coverage/ ./tests/

run-examples:
	php examples/add-order.php
	php examples/products.php

run-examples-php-versions:
	docker run -it --rm --name g2a-int-api-test5.5 -v "$$PWD":/usr/src/myapp -w /usr/src/myapp php:5.5-cli php examples/add-order.php
	docker run -it --rm --name g2a-int-api-test5.6 -v "$$PWD":/usr/src/myapp -w /usr/src/myapp php:5.6-cli php examples/add-order.php
	docker run -it --rm --name g2a-int-api-test7.0 -v "$$PWD":/usr/src/myapp -w /usr/src/myapp php:7.0-cli php examples/add-order.php
	docker run -it --rm --name g2a-int-api-test7.1 -v "$$PWD":/usr/src/myapp -w /usr/src/myapp php:7.1-cli php examples/add-order.php
	docker run -it --rm --name g2a-int-api-test7.2 -v "$$PWD":/usr/src/myapp -w /usr/src/myapp php:7.2-cli php examples/add-order.php
