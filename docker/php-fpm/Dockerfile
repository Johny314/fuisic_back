FROM php:8.3-fpm

# Копирование кастомного php.ini
COPY ./docker/php-fpm/php.ini $PHP_INI_DIR/php.ini

WORKDIR /var/www

# Установка системных зависимостей и очистка кэша
RUN apt-get -y update \
    && apt-get install -y libfreetype6-dev libpq-dev libicu-dev libjpeg62-turbo-dev libpng-dev libxml2-dev libgmp-dev libzip-dev zip unzip curl git supervisor \
    && php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && pecl install redis \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* \
# Установка расширений PHP
&& docker-php-ext-configure gd --with-freetype --with-jpeg \
&& docker-php-ext-install -j$(nproc) iconv gd mysqli pdo_pgsql pdo_mysql soap bcmath gmp intl opcache zip sockets  \
&& docker-php-ext-enable redis \
# Создание пользователя для приложения
&& groupadd -g 1000 www \
&& useradd -u 1000 -ms /bin/bash -g www www \
&& touch /var/log/supervisord.log \
&& chmod 666 /var/log/supervisord.log

# Копирование содержимого приложения
COPY . /var/www

# Настройка прав доступа
COPY --chown=www:www . /var/www

# Переключение пользователя
USER www

EXPOSE 9000
CMD ["php-fpm"]
