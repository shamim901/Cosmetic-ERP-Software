# WorldTech Multi Store Management For Islamic Foundation

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.6/installation#installation)

Clone the repository

    git clone https://github.com/bilaschandra/worldtech_books_points.git

Switch to the repo folder

    cd worldtech_books_points

If you have linux system, you can execute the command below only in your project root

    1) sudo chmod -R 777 install.sh
    2) ./install.sh

If you have windows system, you can run Artisan Command for database setup, connection and configuration.

    php artisan install:app

Generate a new application key

    php artisan key:generate

Install Passport

    php artisan passport:install

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the database seeders

    php artisan db:seed

Install the javascript dependencies using npm

    npm install

Compile the dependencies

    npm run development

For generating the files of unisharp file manager

    php artisan vendor:publish --tag=lfm_public

For linking storage folder in public

    php artisan storage:link

Start the local development server

    php artisan serve


**You can now access the server at** http://localhost:8000


***Work with JS/CSS***

we have 2 files in the directory public/js/global.js or public/css/global.css
to write the custom code for styling or javascript

Compile the JS/CSS in development stage

    npm run development or npm run dev 

Compile the JS/CSS in production stage

    npm run production or npm run prod
    
Watch and Compile the JS/CSS in development stage

    npm run watch

**Command list**

    git clone https://github.com/bilaschandra/worldtech_books_points.git
    cd worldtech_books_points
    cp .env.example .env
    composer install
    npm install
    npm run development
    php artisan storage:link
    php artisan key:generate
    php artisan passport:install
    php artisan vendor:publish --tag=lfm_public
    php artisan migrate
    php artisan passport:install
    php artisan passport:client --personal

## Please note

- To run test cases, add SQLite support to your php
- The command `php artisan passport:client --personal` is very important for login/registration, it will throw and error if not run it

## Other Important Commands
- To fix php coding standard issues run - composer format
- To perform various self diagnosis tests on your Laravel application. run - php artisan self-diagnosis
- To clear all cache run - composer clear-all
- To built Cache run - composer cache-all
- To clear and built cache run - composer cc

## Logging In

`php artisan db:seed` adds three users with respective roles. The credentials are as follows:

* Administrator: `admin@admin.com`
* Backend User: `executive@executive.com`
* Default User: `user@user.com`

Password: `1234`

## Frontend
* Vuejs

Component Library:

https://vueformulate.com/

https://uiv.wxsm.space/

## API documenation
URL: /api/documentation

* Command: `php composer.phar api-doc-generate`

Packages: swagger & swagger-php

Library Doc: https://github.com/zircote/swagger-php/blob/master/Examples/petstore-3.0

https://zircote.github.io/swagger-php/



