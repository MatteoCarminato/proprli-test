#!/bin/bash

sudo chmod -R 777 ./storage

cp .env.example .env

composer install

docker-compose up -d --build

php artisan key:generate --ansi