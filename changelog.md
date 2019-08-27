# Changelog

All notable changes to `basher` will be documented in this file.

##### Version 1.6.0
- update documentations
- change PROJECT_NAME to PROJECT_DIRECTORY_NAME variable
- minor improvement on basher:clean, basher:env, basher:generate, basher:ignore, basher:push, basher:revert and basher:tag commands 
- major improvement on basher:tag, change create by "new" and delete by "del" on options
- add new command basher:force-composer-update, force to update dependencies from laravel project creating a swap

##### Version 1.5.3
- fix error on basher:generate when directory exists

##### Version 1.5.2
- update descriptions
- improve log messages and verbosity
- add validate basher:clean, now, clean inside the project, please, set PROJECT_NAME variable on .env file
- validate basher:env, now don't delete .env file before set params
- command basher:tag now can create/delete tags from git

##### Version 1.5.1
- some fixes

##### Version 1.5.0
- add php artisan clear-compiled on command basher:clean
- command basher:push pulling content before pushing, previously stashed content and apply stashed after pulling
- code optimizations on commands
- optimize verbosity
- remove deploy function
- command basher:generate now accept tables comma-separated

##### Version 1.4.9
- some fixes

##### Version 1.4.8
- update changelog, contributing and readme files
- add new command basher:ignore, see readme to use:
``` bash 
php artisan basher:ignore
```

##### Version 1.4.8
- update changelog, contributing and readme files

##### Version 1.4.7
- update changelog, contributing and readme files
- update command basher:generate, fix generate on directory

##### Version 1.4.6
- update changelog, contributing and readme files

##### Version 1.4.5
- update changelog, contributing and readme files

##### Version 1.4.5
- update changelog, contributing and readme files
- update command basher:generate, validate empty/default value, mejora de codigo

##### Version 1.4.4
- update changelog, contributing and readme files
- update command basher:tag, validate empty/default value

##### Version 1.4.3
- update changelog, contributing and readme files
- update command basher:revert, validate empty/default value

##### Version 1.4.2
- update changelog, contributing and readme files
- update command basher:push, validate empty/default value

##### Version 1.4.1
- update changelog, contributing and readme files
- add new command, see readme to use:
``` bash 
php artisan basher:generate
```

##### Version 1.3.3
- update changelog, contributing and readme files
- update documentation for all commands

##### Version 1.3.2
- update changelog, contributing and readme files
- fix error call commands revert and tag inverse

##### Version 1.3.1
- update changelog, contributing and readme files
- fix basher:revert not call
- add new command, see readme to use:
``` bash 
php artisan basher:tag
```

##### Version 1.2.1
- update changelog, contributing and readme files
- add new command, see readme to use:
``` bash 
php artisan basher:revert
```

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