USER_ID ?= $(shell id -u)
GROUP_ID ?= $(shell id -g)
COMPOSE = docker compose

setup-local: env-prepare storage-setup composer-install link-docker-compose-file up app-key-generate package-discover db-setup

start: up
stop: down

env-prepare:
	test -f .env || cp .env.example .env

storage-setup:
	mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views storage/app/public bootstrap/cache

composer-install:
	docker run --rm -u "$(USER_ID):$(GROUP_ID)" \
		-v "$(CURDIR):/var/www/html" \
		-v "$(CURDIR)/../fuisic-laravel-auth:/var/www/html/../fuisic-laravel-auth:ro" \
		-w /var/www/html \
		-e CACHE_STORE=array \
		laravelsail/php83-composer:latest \
		composer install --ignore-platform-reqs --no-scripts
	docker run --rm -u "$(USER_ID):$(GROUP_ID)" \
		-v "$(CURDIR):/var/www/html" \
		-v "$(CURDIR)/../fuisic-laravel-auth:/var/www/html/../fuisic-laravel-auth:ro" \
		-w /var/www/html \
		-e CACHE_STORE=array \
		laravelsail/php83-composer:latest \
		composer dump-autoload

link-docker-compose-file:
	@test -f .git/info/exclude || (mkdir -p .git/info && touch .git/info/exclude)
	@grep -qxF 'docker-compose.yml' .git/info/exclude || echo 'docker-compose.yml' >> .git/info/exclude
	@test -f docker-compose.yml || ln -s docker-compose-local.yml docker-compose.yml

up:
	$(COMPOSE) up -d --build

down:
	$(COMPOSE) down

app-key-generate:
	$(COMPOSE) exec app php artisan key:generate

package-discover:
	$(COMPOSE) exec app php artisan package:discover --ansi

db-setup:
	$(COMPOSE) exec app php artisan migrate --seed

db-setup-test:
	$(COMPOSE) exec app php artisan migrate --env=testing

run-tests:
	$(COMPOSE) exec app php artisan test

start-frontend:
	$(COMPOSE) --profile frontend up -d react

artisan:
	$(COMPOSE) exec app php artisan $(filter-out $@,$(MAKECMDGOALS))

%:
	@:
