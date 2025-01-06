FROM php:8.3.11-fpm
COPY . /var/www/html

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libpq-dev \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql mysqli \
    && docker-php-ext-enable gd pdo pdo_mysql mysqli

RUN pecl install xdebug \
   && docker-php-ext-enable xdebug
