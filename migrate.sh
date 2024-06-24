#!/bin/bash
docker exec -it proprli-test_laravel-proprli_1 composer install

php artisan migrate --force

php artisan db:seed

php artisan serve