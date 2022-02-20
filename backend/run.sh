#!/bin/bash

# correr al clonar proyecto de github
composer install
cp .env.example .env
php artisan key:generate
./vendor/bin/sail up

# php artisan migrate
# php artisan db:seed