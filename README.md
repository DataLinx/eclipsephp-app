<div style="text-align: center">

<img src="docs/assets/logo.svg" title="Eclipse" width="300px" alt="Eclipse"/>

![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/eclipsephp/app)
![Packagist Version](https://img.shields.io/packagist/v/eclipsephp/app)
[![Tests](https://github.com/DataLinx/eclipsephp-app/actions/workflows/test-runner.yml/badge.svg)](https://github.com/DataLinx/eclipsephp-app/actions/workflows/test-runner.yml)
![Packagist Downloads](https://img.shields.io/packagist/dt/eclipsephp/app)
[![Conventional Commits](https://img.shields.io/badge/Conventional%20Commits-1.0.0-%23FE5196?logo=conventionalcommits&logoColor=white)](https://conventionalcommits.org)
![Packagist License](https://img.shields.io/packagist/l/eclipsephp/app)

</div>

## About

Eclipse is a PHP app built with Filament and the [TALL stack](https://tallstack.dev/). Its purpose is to offer a solid platform on a modern stack upon which custom web apps can be built. Apart from being compatible with Filament plugins, it aims to offer a set of pre-built modules and other generic components which allow a web app for custom project needs to be built quickly and efficiently with little or no boilerplate code.

It's being developed by [DataLinx](https://www.datalinx.si/), a company in Slovenia/EU, for use in client and own web projects. It's currently in pre-alpha development stage.

This package serves as a starting point and reference for all Eclipse-based PHP projects.

## Requirements
* PHP >= 8.3
    * See the `require` section in [composer.json](composer.json) for required PHP extensions
* MariaDB >= 10.11
* Composer
* For local development:
    * Node.js with npm
    * Although not obligatory, [Lando](https://lando.dev/) is recommended for setting up the Docker containers. All Eclipse packages already ship with a Lando config file.

## Getting started
1. Create a new project with composer:
    ```shell
    composer create-project eclipsephp/app myprojectname -s dev
    ````
2. Run `npm install` in the directory.
3. Run `lando start` and then `lando ssh` to enter into the container.
4. Run `php artisan eclipse:install` and follow the installation procedure 😎

## Contributing
If you have some suggestions how to make this package better, please open an issue or even better, submit a pull request.

Should you want to contribute, please see the development guidelines in the [DataLinx PHP package template](https://github.com/DataLinx/php-package-template).

### Changelog
All notable changes to this project are automatically documented in the [CHANGELOG.md](CHANGELOG.md) file using the release workflow, based on the [release-please](https://github.com/googleapis/release-please) GitHub action.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

For all this to work, commit messages must follow the [Conventional commits](https://www.conventionalcommits.org/) specification, which is also enforced by a Git hook.
