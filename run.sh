#!/bin/bash

# correr al clonar proyecto de github
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
#sudo ./vendor/bin/sail up -d
#sudo ./vendor/bin/sail artisan storage:link
#sudo ./vendor/bin/sail artisan key:generate
#sudo ./vendor/bin/sail artisan migrate

# php artisan migrate
# php artisan db:seed
