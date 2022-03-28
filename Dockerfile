# Microsoft\Graph PHP use version 8.0 (PHP 8.1: Serializable deprecated)
FROM php:8.0-fpm
RUN docker-php-ext-install pdo pdo_mysql 
RUN apt update && apt install -y zlib1g-dev g++ libicu-dev zip libzip-dev zip libpq-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

WORKDIR /var/www/website

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer