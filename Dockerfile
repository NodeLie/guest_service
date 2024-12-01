FROM php:8.2-fpm

# Установим необходимые зависимости
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    curl && \
    docker-php-ext-install pdo pdo_pgsql zip && \
    pecl install xdebug && docker-php-ext-enable xdebug

# Установим Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Настроим рабочую директорию
WORKDIR /var/www

# Установим права
RUN chown -R www-data:www-data /var/www

# Установим Laravel
COPY . /var/www
RUN composer install --no-dev --optimize-autoloader

# Экспонируем порт
EXPOSE 9000

# Запуск PHP-FPM
CMD ["php-fpm"]
