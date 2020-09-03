

# Laravel 7 Repositories
Laravel 7 Repositories is used to abstract the data layer, making our application more flexible to maintain.
You want to know a little more about the Repository pattern? [Read this great article](http://bit.ly/1IdmRNS).

## Installation
**>= laravel 6.x**
**1) composer install**
**2) npm install**
**3) php artisan migrate**
**4) php artisan serve**
## For check mail send
```
php artisan email:birthday
```
## Configuration

Please create .env configuration file from .env.example and change configuration variable.Please see below changes variable needed.

```
DB_HOST=<<Database Host>>
DB_PORT=<<Database Port>>
DB_DATABASE=<<Database Name>>
DB_USERNAME=<<Database Username>>
DB_PASSWORD=<<Database Password>>
MAIL_MAILER=<<Mailer Driver>>
MAIL_HOST=<<SMTP host>>
MAIL_PORT=<<SMTP Port Number>>
MAIL_USERNAME=<<SMTP username>>
MAIL_PASSWORD=<<SMTP password>>
MAIL_ENCRYPTION=<<SMTP Encryption>>
MAIL_FROM_ADDRESS=<<From Address>>
```

## Commands
To send emails next day user birthday, run this command:
```
php artisan email:birthday
```