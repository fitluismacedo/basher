# Changelog

All notable changes to `basher` will be documented in this file.

##### Version 1.1.2


##### Version 1.1.1
- update changelog, contributing and readme files
- add new command, see readme to use:
``` bash 
php artisan basher:deploy
```


##### Version 1.0.1
- update changelog, contributing and readme files
``` bash 
php artisan basher:env {dev|testing|prod|othername}
```
- validate if file .env.[envname] is created, return warning

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
php artisan basher:env {dev|testing|prod|othername}
```
Set .env params to a desired enviroment, type [envname] after command to re-set values; need a file .env.[envname] to copy params