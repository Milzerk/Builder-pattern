# start with the official Composer image and name it
FROM composer:2.3 AS composer

# app php
FROM php:8.1-fpm AS app

ARG user
ARG uid

# copy the Composer PHAR from the Composer image into the PHP image
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
# RUN chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www/html

USER $user
