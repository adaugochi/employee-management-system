<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

# Employee Management System (EMS)
EMS is a web-based solution that help organizations manage their employees. This application allows employees and an
admin to use the system. The administrator create user accounts and the application helps in salary payments.

## User Types
- Admin
- Employee

## Requirements
- PHP - ^7.2
- [node](https://nodejs.org/)
- npm
- composer

## Clone
You have to clone this repo using either `HTTPS` or `SSH`

- HTTPS
```bash
git clone https://github.com/adaugochi/employee-management-system.git
```

- SSH
```bash
git clone git@github.com:adaugochi/employee-management-system.git
```
## Environment Variables
Make a copy of `.env.example` to `.env` in the env directory. Fill in the with appropriate details. Examples

```dotenv
## Database
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

## Mail (You can create an account with mailtrap.io)
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null

## Default Admin creds
DEFAULT_ADMIN_EMAIL=admin@ems.com
DEFAULT_ADMIN_PASSWORD=11111111
DEFAULT_ADMIN_PHONE_NUMBER="08101111111"
DEFAULT_ADMIN_INTL_NUMBER="+2348101111111"
```

## Install Dependencies
#### Composer Dependencies
```bash
composer install
```

#### Node.js Dependencies
```bash
npm install
```

## Virtual Host Setup (optional)
*Windows*
[Link 1](http://foundationphp.com/tutorials/apache_vhosts.php)
[Link 2](https://www.kristengrote.com/blog/articles/how-to-set-up-virtual-hosts-using-wamp)

*Mac*
[Link 1](http://coolestguidesontheplanet.com/set-virtual-hosts-apache-mac-osx-10-9-mavericks-osx-10-8-mountain-lion/)
[Link 2](http://coolestguidesontheplanet.com/set-virtual-hosts-apache-mac-osx-10-10-yosemite/)

*Debian Linux*
[Link 1](https://www.digitalocean.com/community/tutorials/how-to-set-up-apache-virtual-hosts-on-ubuntu-14-04-lts)
[Link 2](http://www.unixmen.com/setup-apache-virtual-hosts-on-ubuntu-15-04/)

Sample Virtual Host Config for Apache
```apache
<VirtualHost *:80>
    ServerAdmin admin@example.com
    DocumentRoot "<WebServer Root Dir>/employee-management-system/public"
    ServerName local.manup.com
    <Directory <WebServer Root Dir>/employee-management-system/public>
       AllowOverride all
       Options -MultiViews
      Require all granted
    </Directory>
</VirtualHost>
```

## Setup Database

### Create Database
```sql
CREATE DATABASE ems CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci;
```

### Migration
```bash
# run migration
php artisan migrate

# rollback migration (optional)
php artisan migrate:rollback

# refresh migration (optional)
php artisan migrate:refresh
```

### Specify Path to Migration File (optional)
```bash
# run migration
php artisan migrate --path=database/migrations/filename.php

# rollback migration
php artisan migrate:rollback --path=database/migrations/filename.php

# refresh migration
php artisan migrate:refresh --path=database/migrations/filename.php
```

### Seeding
This will help seed the default admin credentials into the database
```bash
php artisan db:seed --class=UserSeeder
```

## Compile SCSS to CSS (During Development)
You can compile your scss file to css using:

```bash
npm run watch
```

## Starting the Application (optional)
You can run the application in development mode by running this command from the project directory:
```bash
php artisan serve
```
The command above can be skipped if you already created a virtual host

## Author of README.md
- Adaa Mgbede <adaamgbede@gmail.com>
[Linked In](https://www.linkedin.com/in/maryfaithmgbede/)

## Code of Conduct
In order to ensure that the Laravel community is welcoming to all, please review and
abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).
