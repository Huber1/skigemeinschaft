FROM composer:lts AS composer

WORKDIR /app

COPY .. .

RUN composer install --no-interaction --no-progress --no-dev --optimize-autoloader --ignore-platform-reqs


FROM node:lts AS node

WORKDIR /app

COPY --from=composer /app .

RUN npm install
RUN npm run build


FROM trafex/php-nginx:3.11.1

USER root
RUN apk add php85-iconv php85-exif php85-zip php85-pecl-apcu php85-simplexml
USER nobody

COPY .docker/nginx.conf /etc/nginx/conf.d/default.conf

COPY --chown=nobody --from=node /app /var/www/html
