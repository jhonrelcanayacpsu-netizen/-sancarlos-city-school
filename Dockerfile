FROM php:8.4-apache
WORKDIR /var/www/html
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN apt-get update && apt-get install -y libzip-dev libpng-dev libonig-dev \
    && docker-php-ext-install pdo_mysql gd mbstring zip bcmath \
    && a2enmod rewrite \
    && sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer
COPY . .
RUN composer install --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs
RUN chown -R www-data:www-data storage bootstrap/cache || true
RUN chmod -R 775 storage bootstrap/cache || true

EXPOSE 80
CMD php artisan config:clear; php artisan migrate --force || true; apache2-foreground
