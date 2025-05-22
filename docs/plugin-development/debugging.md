# Debugging

## Xdebug in PhpStorm
If you follow [our guide](https://github.com/DataLinx/php-package-template/blob/main/docs/Testing%20with%20PhpStorm.md) on how to set up testing in PhpStorm, you are all set to debug while running tests. Just set breakpoints in code and run the test.

## Xdebug through the browser
Feature still pending. Should work, but it doesn't.

## Laravel Telescope
Telescope is already installed with the core package and ready to use in the development environment.
To enable it, set the `TELESCOPE_ENABLED` variable in your `.env` file to `true` and visit the `/telescope` URL or click the _Tools > Telescope_ link in the panel navigation.

To use the dark theme also set the `TELESCOPE_DARK_THEME` variable.
