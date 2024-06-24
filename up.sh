#!/bin/bash

cp .env.example .env

php artisan key:generate --ansi

docker-compose up -d --build

docker-compose exec laravel php artisan migrate --force
