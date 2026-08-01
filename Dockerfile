FROM node:20-alpine AS assets
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY . .
RUN npm run build

FROM php:8.3-fpm-alpine AS app
WORKDIR /var/www/html

RUN apk add --no-cache \
    nginx \
    supervisor \
    sqlite \
    sqlite-dev \
    icu-dev \
    libzip-dev \
    oniguruma-dev \
    libxml2-dev \
    curl-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    bash \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install -j$(nproc) \
    pdo_sqlite \
    intl \
    zip \
    gd \
    bcmath \
    opcache \
    mbstring \
    xml \
    curl

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --no-scripts --prefer-dist --optimize-autoloader

COPY . .
COPY --from=assets /app/public/build ./public/build

RUN mkdir -p database storage/framework/{cache,sessions,views} storage/logs bootstrap/cache \
  && touch database/database.sqlite \
  && composer dump-autoload --optimize \
  && chown -R www-data:www-data /var/www/html \
  && chmod -R 775 storage bootstrap/cache database

COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

EXPOSE 8080

ENTRYPOINT ["/entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
