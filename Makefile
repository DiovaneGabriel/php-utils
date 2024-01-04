.PHONY: test

CONTAINER_PHP = utils-php-test

test:
	clear && \
	docker exec ${CONTAINER_PHP} php ./test/test.php

install:
	clear && \
	docker compose up -d && \
	docker exec -it ${CONTAINER_PHP} sh -c "cd /var/www/html && composer update --dev"

up:
	docker compose up -d

down:
	docker compose down