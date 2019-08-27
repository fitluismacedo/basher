# basher
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

A little helper for delevopers

## Installation
Via Composer
``` bash
$ composer require fitluismacedo/basher
```

## Usage
``` bash 
php artisan basher:force-composer-update
```
force to update dependencies from laravel project creating a swap

``` bash 
php artisan basher:clean
```
clear all laravel cache's and regenerate composer using cache:clear, route:clear, view:clear, config:clear, clear-compiled and composer dump-autoload -o

``` bash 
php artisan basher:push {commit=Avances Y-m-d H:i:s} {branch=master}
```
pushing files to git, type you {commit} name and {branch} name to push, if {branch} is empty, content will push to master branch
* use quotes to set {commit} name
* now exec git stash, pull and stash apply before push content

``` bash
php artisan basher:env {environment}
```
set .env params to a desired enviroment, add {environment} argument to change; need a file .env.[envname] to copy params

``` bash
php artisan basher:revert {commidId} {branch=master}
```
revert files to a specific commit id and force to push content, add argument {commidId} and branch to continue, if {branch} is empty, content will revert on master branch

``` bash
php artisan basher:tag {option} {tagname}
```
create a git tag and push content, add {option} (new/del) argument and {tagname} to continue
* use quotes to set {tagname} name

``` bash
php artisan basher:generate {option=all} {directory=PROJECT_DIRECTORY_NAME}
```
generate laravel models from mysql connection on .env file, add {option} and {directory} argument to generate models
* now can generate one o more tables comma-separated
* use PROJECT_DIRECTORY_NAME variable on .env to set default directory name 
- `php artisan basher:generate`
- `php artisan basher:generate all DevopsStable`
- `php artisan basher:generate users,migrations,telescope_entries DevopsStable`

``` bash 
php artisan basher:ignore {filename}
```
Ignore a file that you do not want to commit, add argument {filename} with project relative path to use

## Change log
Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing
``` bash
$ composer test
```

## Contributing
Please see [contributing.md](contributing.md) for details and a todolist.

## Security
If you discover any security related issues, please email falconshady@gmail.com instead of using the issue tracker.

## Credits
- [Luis Macedo][link-author]
- [All Contributors][link-contributors]

## License
Giftware License. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/fitluismacedo/basher.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/fitluismacedo/basher.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/fitluismacedo/basher/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/fitluismacedo/basher
[link-downloads]: https://packagist.org/packages/fitluismacedo/basher
[link-travis]: https://travis-ci.org/fitluismacedo/basher
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/fitluismacedo
[link-contributors]: ../../contributors]