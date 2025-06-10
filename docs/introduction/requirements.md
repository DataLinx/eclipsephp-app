# System requirements

## Server
* PHP >= 8.3
    * See the `require` section in [composer.json](https://github.com/DataLinx/eclipsephp-app/blob/main/composer.json) for any required PHP extensions
* MariaDB >= 10.11
* Composer
* Node.js and npm

## Development
Although not strictly obligatory, [Lando](https://lando.dev/) is recommended for setting up the Docker containers. All Eclipse packages already ship with a Lando config file.

If you create the project by forking the app repository and `git clone`-ing, there are no additional requirements. All the tools will be available inside the Lando instance, including node.js and npm.

However, if you want to create a new project via composer, you need to have on your system:
* PHP >= 8.3
* Composer

The Lando instance automatically includes all other system requirements.
Node.js and npm are provided in the Lando container.
