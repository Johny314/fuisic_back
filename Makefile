setup-local: env-prepare composer-install link-docker-compose-file sail-up app-key-generate db-setup

start: sail-up
stop: sail-down

env-prepare:
	cp .env.example .env

composer-install:
	docker run --rm -u "$(USER_ID):$(GROUP_ID)" -v "$(CURDIR):/var/www/html" -w /var/www/html laravelsail/php83-composer:latest composer install --ignore-platform-reqs

link-docker-compose-file:
	@test -f .git/info/exclude || touch .git/info/exclude
	echo "docker-compose.yml" >> .git/info/exclude
	test ! -f "docker-compose.yml" && ln -s docker-compose-local.yml docker-compose.yml

sail-up:
	./vendor/bin/sail up -d

sail-down:
	./vendor/bin/sail down

app-key-generate:
	./vendor/bin/sail artisan key:generate

db-setup:
	./vendor/bin/sail artisan migrate --seed

db-setup-test:
	./vendor/bin/sail artisan migrate --env=testing

run-tests:
	./vendor/bin/sail artisan test
