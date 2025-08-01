FROM composer:lts AS composer

WORKDIR /app

COPY .. .

RUN composer install --no-interaction --no-progress --no-dev --optimize-autoloader --ignore-platform-reqs


FROM node:lts AS node

WORKDIR /app

COPY --from=composer /app .

RUN npm install
RUN npm run build


FROM trafex/php-nginx:latest

USER root
RUN apk add php84-iconv php84-exif php84-zip php84-pecl-apcu php84-simplexml
USER nobody

COPY .docker/nginx.conf /etc/nginx/conf.d/default.conf

COPY --chown=nobody --from=node /app /var/www/html
