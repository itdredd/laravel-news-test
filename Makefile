rebuild:
	./vendor/bin/sail down -v --remove-orphans \
	&& ./vendor/bin/sail build \
	&& ./vendor/bin/sail up -d

up:
	./vendor/bin/sail up -d

down:
	./vendor/bin/sail down

php:
	docker-compose exec laravel.test bash

mysql:
	docker-compose exec mysql bash

restart-php:
	docker-compose restart laravel.test
