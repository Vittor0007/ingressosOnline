FROM php:8.4-fpm

RUN apt-get update && apt-get install -y libpq-dev libicu-dev libzip-dev libpng-dev libjpeg62-turbo-dev

RUN docker-php-ext-configure gd --with-jpeg

RUN docker-php-ext-install pdo_pgsql intl zip gd opcache

RUN pecl install redis && docker-php-ext-enable redis

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

ARG APP_VERSAO
ENV APP_VERSAO=${APP_VERSAO}