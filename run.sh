#!/bin/bash

echo Uploading Application container
docker-compose up -d

echo Copying the configuration example file
docker exec -it musiclibrary-app cp .env.example .env

echo Install dependencies
docker exec -it musiclibrary-app composer install

echo Generate key
docker exec -it musiclibrary-app php artisan key:generate

echo Make migrations
docker exec -it musiclibrary-app php artisan migrate

echo Information of new containers
docker ps -a
