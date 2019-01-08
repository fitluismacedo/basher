# basher

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

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
php artisan basher:env --env={dev|testing|prod|othername}
```
change .env params to a desired enviroment, type param --env=testing to change .env to a testing params for example, to copy params need a file .env.[enviroment name] to copy information to .env


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