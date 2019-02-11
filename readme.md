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
php artisan basher:env [dev|testing|prod|othername]
```
Set .env params to a desired enviroment, type [envname] after command to re-set values; need a file .env.[envname] to copy params

``` bash 
php artisan basher:deploy
```
Install laravel project on server
1. Set url to cloning and credentials to process
2. If you don't remember credentials, set 'n' on 2nd question
3. basher:deploy set all required permisions to run laravel on Amazon Linux ami 2


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