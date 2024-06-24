#!/bin/bash

cp .env.example .env

php artisan key:generate --ansi

docker-compose up -d --build

php artisan migrate --force
