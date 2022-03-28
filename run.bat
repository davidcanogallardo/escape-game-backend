@echo off

@REM correr al clonar proyecto de github
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
@REM esto pero para windows
@REM sudo ./vendor/bin/sail up
@REM sudo ./vendor/bin/sail artisan storage:link
@REM sudo ./vendor/bin/sail artisan key:generate
@REM sudo ./vendor/bin/sail artisan migrate