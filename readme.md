# Licitaciones (bids)

Full stack laravel web application created to manage "bids" or "licitaciones" (in spanish) for a company, it allows all CRUD operations in them, in addition, was developed maintaining the SQL relationship established between three different tables, with the data source stored in the MySQL database, to finally allow the user experience through blade pages.

## Frontend
- Blade pages.

## Backend
- Laravel app.

## Database
- MySQL (ORM).

#

## App requirements

You need to have installed [Composer](https://getcomposer.org/) on your system to run this PHP app.

This app also require an PHP server, recomended: [Wamp server](https://www.wampserver.com/en/) (Or another preferer server), once installed please proceed to create an "test_licitaciones" SQL Schema, with admin user: `root` privilegies.

The conection settings can be found in the ".env" project file.

## Conection settings:

> DB_CONNECTION=mysql<br/>
> DB_HOST=127.0.0.1<br/>
> DB_PORT=3306<br/>
> DB_DATABASE=test_licitaciones<br/>
> DB_USERNAME=root<br/>
> DB_PASSWORD=<br/>

## Install the project

In the project directory, run `composer install` to download all the app dependencies.

## Configure MySQL database

With the PHP server running, run `php artisan migrate` in the project direcctory to migrate the MySQL app tables and relations.

Then run `php artisan db:seed` to seed all the MySQL database tables with mock data.

## Start the project

Finally run `php artisan serve` to start a dev local php server. You can now access your project at [http://localhost:8000/](http://localhost:8000/) please enjoy :).

#

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).