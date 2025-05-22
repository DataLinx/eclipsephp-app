# Introduction

## System requirements

### Server
* PHP >= 8.3
    * See the `require` section in [composer.json](https://github.com/DataLinx/eclipsephp-app/blob/main/composer.json) for any required PHP extensions
* MariaDB >= 10.11
* Composer
* Node.js and npm

### Development
Although not strictly obligatory, [Lando](https://lando.dev/) is recommended for setting up the Docker containers. All Eclipse packages already ship with a Lando config file.

If you create the project by forking the app repository and `git clone`-ing, there are no additional requirements. All the tools will be available inside the Lando instance, including node.js and npm.

However, if you want to create a new project via composer, you need to have on your system:
* PHP >= 8.3
* Composer

The Lando instance automatically includes all other system requirements.
Node.js and npm are provided in the Lando container.

## Getting started
1. Create a new project with composer:
    ```shell
    composer create-project eclipsephp/app myprojectname -s dev
    ````
2. Set the app URL to your desired URL
    * `APP_URL` in `.env`
    * `name` property in `.lando.dist.yml` (just the subdomain part)
    * Also fix proxy URLs in `.lando.dist.yml`
3. Build and start the app instance
    ```shell
    lando start
    ```` 

That's it! Open the provided link and the public page should be shown. Add `/admin` to the URL to see the admin panel. The database is already migrated and seeded, and the test logins have already been set.

By doing these few steps you now have a functional Filament app with our Eclipse core package.
