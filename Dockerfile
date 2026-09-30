FROM php:8.2-cli

# 1. Install dependensi sistem dan ekstensi PHP
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql mbstring gd bcmath

# 2. Copy Composer dari image resmi
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Set working directory
WORKDIR /var/www/html

# 4. Copy seluruh file project
COPY . /var/www/html

# 5. Install vendor dependencies PHP
RUN composer install --no-dev --optimize-autoloader

# 6. Set permission folder storage & bootstrap/cache
RUN chmod -R 777 storage bootstrap/cache public

# 7. Expose port & jalankan server via artisan
EXPOSE 8080
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
