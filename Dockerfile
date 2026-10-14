FROM php:8.2-apache
WORKDIR /var/www/html
# Install system deps
RUN apt-get update && apt-get install -y \
    unzip git libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install zip pdo_mysql gd mbstring bcmath xml \
    && a2enmod rewrite
# Composer from official image
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer
COPY . .
# Install PHP deps - ignore platform for Render
RUN composer install --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs || true
RUN composer dump-autoload -o
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache
RUN echo '<VirtualHost *:80>\nDocumentRoot /var/www/html/public\n<Directory /var/www/html/public>\nAllowOverride All\nRequire all granted\n</Directory>\n</VirtualHost>' > /etc/apache2/sites-available/000-default.conf
EXPOSE 80
CMD php artisan config:clear; php artisan migrate --force || true; apache2-foreground
