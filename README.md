# studi-restaurant-symfony-lts-api

**This repository is a simple project use for STUDI courses written with the last version of Symfony.**

```
/*
 * Copyright (C) STUDI, Inc - All Rights Reserved.
 * Unauthorized copying of this repository, via any medium is strictly prohibited.
 * Proprietary and confidential.
 * Written by Gaetan Rolé-Dubruille <gaetan.role@gmail.com>.
 */
```

[![Author](https://img.shields.io/badge/author-gaetan.role%40gmail.com-blue.svg)](https://github.com/gaetanrole)

## Documentation

Before the development, **be sure to be comfortable with your current work environment**.
Like to setup your IDE, install all necessary plugins, prepare your keyboard shortcuts, create your Bash aliases etc...

- [Awesome dotfiles](https://github.com/webpro/awesome-dotfiles)
- [Lean and mean dev with PHPStorm](https://symfonycasts.com/screencast/phpstorm)

As soon as everything is ready, you can read some docs during the development.
Take a look below !

- [Tools helping developers every day](https://www.youtube.com/watch?v=_OEDoPMvNY4)
- [Symfony Fast Track](https://symfony.com/doc/6.2/the-fast-track/fr/index.html)

## Installation instructions

### Project requirements

- [PHP >=7.2.5 or higher](http://php.net/manual/fr/install.php)
- [SQL >=8.0](https://www.mysql.com/fr/downloads/)
- [Symfony CLI](https://symfony.com/download)
- [Composer](https://getcomposer.org/download)
- [Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
- PHP extensions such as : Iconv, JSON, PCRE, Session, Tokenizer and the [usual Symfony application requirements][1].

```bash
$ symfony check:requirements # To check minimal requirements for the project
```

### View

![Symfony view](./studi-restaurant-view.png "Symfony configuration view")

### Installation

1 . **Register a GPG/SSH Key into your Gitlab/Github account** to push verified commits and registry images.

2 . Clone the current repository (SSH):
```bash
$ git clone 'git@github.com:GaetanRole/studi-restaurant-symfony-lts-api.git'
```

3 . Move in and create few `.env.{environment}.local` files, according to your environments with your default configuration.
**.local files are not committed to the shared repository.**

```bash
$ cp .env .env.local   # Create .env.$APP_ENV.local files. Complete them with your configuration.
```

> `.env` equals to the last `.env.dist` file before [november 2018][2].

4 . Set your DATABASE_URL in `.env.{environment}.local` files and run these commands :

```bash
$ composer install        # Install all PHP packages
$ php bin/console d:d:c   # Create your DATABASE related to your .env.local configuration
$ php bin/console d:m:m   # Run migrations to setup your DATABASE according to your entities
```

## Workflow

Each course is related to one branch. 
If you want to know what modification was made, you have to compare the previous branch with the new one.

The ``[main]`` branch is always up to date with all courses.

## Usage

```bash
$ symfony server:start    # Use this command to start a local server.
```

To see all available routes, services... :

```bash
$ bin/console debug:router
$ bin/console debug:container
$ bin/console debug:...
```

## Continuous deployment

This project can be easily hosted on Platform.SH :

<p align="center">
<a href="https://auth.api.platform.sh/"><img src="https://platform.sh/images/deploy/lg-blue.svg" alt="Deploy on Platform.sh" width="180px" /></a>
</p>

```bash
$ symfony project:set-remote [PROJECT_ID]
$ symfony cloud:environment:push
```

## Contributing

Zero contribution is allowed. This software is private for STUDI and STUDI students.

[1]: https://symfony.com/doc/current/reference/requirements.html
[2]: https://symfony.com/doc/current/configuration.html#the-env-file-environment-variables

[⬆️ Back to top](#studi-restaurant-symfony-lts-api)
