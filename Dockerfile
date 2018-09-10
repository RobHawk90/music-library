FROM ambientum/php:7.1-caddy
MAINTAINER robhawk
ENV PORT=8000
COPY . /var/www/app
WORKDIR /var/www/app
RUN composer install
EXPOSE $PORT
