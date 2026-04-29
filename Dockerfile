# 1) Use official PHP image
FROM php:8.2-fpm

# 2) Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    libonig-dev \
    libxml2-dev

# 3) Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath

# 4) Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 5) Set working directory
WORKDIR /var/www

# 6) Copy project files
COPY . .

# 7) Install dependencies
RUN composer install --no-dev --optimize-autoloader

# 8) Generate Laravel key
RUN php artisan key:generate

# 9) Expose port
EXPOSE 8000

# 10) Start Laravel server
CMD php artisan serve --host 0.0.0.0 --port 8000
