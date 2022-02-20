@echo off

@REM correr al clonar proyecto de github
composer install
cp .env.example .env
php artisan key:generate
@REM comanda que sea pa correr un contenedor de docker

@REM php artisan migrate
@REM php artisan db:seed