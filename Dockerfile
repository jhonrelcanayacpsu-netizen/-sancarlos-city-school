FROM php:8.2-cli
WORKDIR /app
COPY . .
RUN apt-get update && apt-get install -y unzip git libzip-dev libpng-dev && docker-php-ext-install zip pdo_mysql gd
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --no-interaction
EXPOSE 10000
CMD php artisan config:clear && php artisan migrate --force && php artisan serve --host 0.0.0.0 --port $PORT
