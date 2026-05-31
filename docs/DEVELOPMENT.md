# Локальная разработка

## Docker Compose

Стек описан в `docker-compose-local.yml`:

| Контейнер | Назначение |
|-----------|------------|
| `app` | PHP 8.3-FPM |
| `nginx` | Веб-сервер, порт `APP_PORT` (8080) |
| `pgsql` | PostgreSQL 15 |
| `redis` | Redis |
| `rabbitmq` | RabbitMQ + management UI |
| `queue` | Worker: `queue:work rabbitmq` |

Симлинк `docker-compose.yml` → `docker-compose-local.yml` создаётся через `make link-docker-compose-file` и добавлен в `.git/info/exclude`.

## Makefile

| Команда | Описание |
|---------|----------|
| `make setup-local` | Полная первичная настройка |
| `make start` / `make stop` | Запуск / остановка |
| `make composer-install` | Composer без Sail (через Docker-образ) |
| `make db-setup` | `migrate --seed` |
| `make run-tests` | PHPUnit |
| `make artisan …` | Любая artisan-команда в контейнере |
| `make start-frontend` | Профиль `frontend` (React, если есть `fuisic_front`) |

## Пакет авторизации (локально)

`composer.json` подключает `fuisic/laravel-auth` через path repository:

```json
"url": "../fuisic-laravel-auth"
```

Клонируйте репозиторий рядом:

```bash
cd ..
git clone git@github.com:FUISIC/fuisic-laravel-auth.git
cd fuisic_back
docker compose exec app composer update fuisic/laravel-auth
```

Изменения в пакете подхватываются через symlink без переустановки.

## Storage

При первом запуске `make setup-local` создаёт:

```
storage/framework/cache/data
storage/framework/sessions
storage/framework/views
storage/app/public
bootstrap/cache
```

## Миграции WebAuthn

После установки пакета auth:

```bash
docker compose exec app php artisan vendor:publish \
  --provider="Laragear\WebAuthn\WebAuthnServiceProvider" --tag="migrations"
docker compose exec app php artisan migrate
```

## Очереди

Worker запускается контейнером `queue`. Проверка RabbitMQ:

- UI: http://localhost:15672
- Очередь писем: `auth.notifications`

Ручной запуск worker:

```bash
docker compose exec app php artisan queue:work rabbitmq \
  --queue=auth.notifications,default --tries=3
```

## Pint (форматирование)

```bash
docker compose exec app ./vendor/bin/pint
```

## Telescope

В local включён по умолчанию: `/telescope`

## Troubleshooting

### 502 Bad Gateway

```bash
docker compose restart app nginx
```

### Composer / Redis при install

`make composer-install` использует `CACHE_STORE=array` и `--no-scripts`, затем `package:discover` после старта контейнеров.

### Порт 8080 занят

Измените `APP_PORT` в `.env`.
