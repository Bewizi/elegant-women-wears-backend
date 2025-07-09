### Step 1: Node.js for frontend (Vite)
FROM node:18 AS node-builder

WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

### Step 2: PHP for Laravel backend
FROM php:8.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    zip unzip curl git libxml2-dev libzip-dev libpng-dev libjpeg-dev libonig-dev

RUN docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy composer files and install dependencies first for better caching
COPY composer.json composer.lock ./
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Copy application code
COPY . .

# Copy only built frontend assets (from Vite)
COPY --from=node-builder /app/public/build /var/www/public/build

COPY --chown=www-data:www-data . /var/www

# .env file: best to mount at runtime, or uncomment below to copy it (not recommended for production)
# COPY .env .env

EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000