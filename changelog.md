# Changelog

All notable changes to `basher` will be documented in this file.

##### Version 1.0.0
``` bash 
php artisan basher:clean
```
clear all laravel cache's and regenerate composer executing commands:
- `php artisan cache:clear`
- `php artisan route:clear`
- `php artisan view:clear`
- `php artisan config:clear`
- `composer dump-autoload -o`

``` bash 
php artisan basher:push
```
pushing files to git, type you commit name and branch to push, if branch is empty, content will push to master branch

``` bash 
php artisan basher:env --env={dev|testing|prod|othername}
```
change .env params to a desired enviroment, type param --env=testing to change .env to a testing params for example, to copy params need a file .env.[enviroment name] to copy information to .env