
# Authorization Microservice

## Pre Requisites

PHP 8.2.12

10.4.32-MariaDB

## Steps to Setup on local

1. Install PHP 8.2.12 and database 10.4.32-MariaDB on your machine.
2. Take pull from repo and cd into repo folder
3. run coposer install
4. npm install && npm run build
5. php artisan db:seed --class=PermissionTableSeeder
6. php artisan optimize:clear
7. composer run dev