FROM php:8.1-fpm

FROM php:8.1-fpm-alpine

RUN apk update && apk add --no-cache libzip-dev zlib-dev zip postgresql-dev && \ 
docker-php-ext-install exif zip pdo pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY --chown=www-data:www-data . .

RUN composer install 

CMD php artisan key:generate && \
    php artisan migrate && \
    php artisan storage:link && \
    php-fpm
