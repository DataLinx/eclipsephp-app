# Running tests

## Console
You can run the tests when inside the container (recommended) with:
```shell
composer test
```
... or outside the container:
```shell
lando test
```
Either way, this is just a proxy to the testbench `package:test` command.

If you are developing the Core package, you must publish the Eclipse-provided config files before you can run tests.
```shell
  lando testbench vendor:publish --tag=eclipse-config
```
The reason for this is that these config files include other vendor configs that are already pre-configured the way we want them to be (i.e., multi-tenancy). All other plugins do not have this requirement — they must be built to fit any configuration.

:::tip
If you ever get an error stating your app encryption key is not set, it means the Testbench skeleton is not set up. Run `composer setup` and everything needed will be set up.
:::

## PhpStorm
See our [Testing with PhpStorm](https://github.com/DataLinx/php-package-template/blob/main/docs/Testing%20with%20PhpStorm.md) guide to set up testing in PhpStorm.

::: warning Please note
If you run tests in PhpStorm, the Pest cache in the `vendor/pestphp/pest/.temp` dir is created with your root user for some reason. It's not a problem until you want to run tests in the console. If you want to switch to testing in the console, you have to delete the created directories inside the `.temp` dir.
If you know how to fix this, please open a discussion or better yet, submit a pull request.
::::

## Testing with multiple PHP versions
See our [Running tests for a specific PHP version with Lando](https://github.com/DataLinx/php-package-template/blob/main/docs/Running%20tests%20for%20a%20specific%20PHP%20version.md#running-tests-for-a-specific-php-version-with-lando) guide.

Apart from that, make sure that your alternative `composer.json`:
* has a `name` attribute
* includes the package service provider in `extra.laravel`
* includes the same `autoload` and `autoload-dev` lines

... since these cannot be merged from the main `composer.json`.

Also, when testing inside the alternative Lando env, for some reason, you must use the long form `composer run-script test` instead of just `composer test`, like in the project root.
