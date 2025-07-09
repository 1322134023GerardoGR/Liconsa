FROM php:8.2-fpm-alpine3.21

RUN apk update && apk add --no-cache \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    git \
    curl \
    bash \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apk add --no-cache nodejs npm

WORKDIR /var/www

COPY . .

RUN composer install --no-interaction --optimize-autoloader

RUN npm install

RUN npm run dev

RUN chown -R www-data:www-data /var/www

RUN cp .env.example .env

RUN php artisan key:generate

EXPOSE 9000

CMD ["php-fpm"]
