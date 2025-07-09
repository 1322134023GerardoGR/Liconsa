FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    git \
    curl \
    bash \
    gcc \
    g++ \
    make \
    autoconf \
    && docker-php-ext-configure gd \
    && docker-php-ext-install gd zip pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install -y \
    nodejs \
    npm

WORKDIR /var/www

COPY . .

RUN composer install --no-interaction --optimize-autoloader
RUN npm install

RUN chown -R www-data:www-data /var/www

RUN cp .env.example .env

RUN php artisan key:generate


RUN npm run build
CMD ["php-fpm"]
