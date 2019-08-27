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
clear all laravel cache's and regenerate composer executing commands:
- `php artisan cache:clear`
- `php artisan route:clear`
- `php artisan view:clear`
- `php artisan config:clear`
- `php artisan clear-compiled`
- `composer dump-autoload -o`

``` bash 
php artisan basher:push $commit $branch
```
pushing files to git, type you commit name and branch to push, if branch is empty, content will push to master branch
* now exec git stash, pull and stash apply before push content

``` bash
php artisan basher:env $environment
```
Set .env params to a desired enviroment, add enviroment argument after command to re-set values; need a file .env.[envname] to copy params

``` bash
php artisan basher:revert $commidId $branch
```
Revert files to a specific commit id and force to push content, add argument commidId and branch to continue

``` bash
php artisan basher:tag $option $tagname
```
Create a git tag and push content, add argument option and tagname to continue, use options new or del to create or delete a tag

``` bash
php artisan basher:generate $option $directory
```
Generate laravel models from mysql connection set on .env file, add option and directory argument to generate models
* now can generate one o more tables comma-separated

``` bash 
php artisan basher:ignore
```
Ignore a file that you do not want to commit, type [filename] with project relative path to use

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