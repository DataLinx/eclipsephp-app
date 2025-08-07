## Settings

Application and plugin settings are implemented with the help of the Spatie's [laravel-settings](https://github.com/spatie/laravel-settings) package and Filament's official [Spatie Settings plugin](https://filamentphp.com/plugins/filament-spatie-settings). This allows strongly typed settings objects to be used as models for Filament's forms, which means implementing settings is as easy as implementing forms for Filament resources.

Features:
* Use strongly typed objects for settings
* Easy implementation of settings pages, using Filament's standard form builder
* Database storage
* App and plugin support
* Caching
* Multitenancy support (Eclipse feature)

### Adding settings
First, see the [Usage](https://github.com/spatie/laravel-settings?tab=readme-ov-file#usage) section of the laravel-settings package to create a new settings class.  
Then, create a Filament settings page for the created class:
```shell
php artisan make:filament-settings-page ManageMyPackage MyPackageSettings
```

**App-level settings** are automatically discovered from the `app/Settings` directory. This also includes settings migrations from `database/settings`. There's nothing more you need to do or know, besides the mentioned package docs.

For **plugin-level settings**, the following should be used:
* Your service provider should extend our `Eclipse\Common\Foundation\Providers\PackageServiceProvider` class.
* Your package definition should include a call to the `hasSettings()` method, so that the plugin's settings and settings migrations are auto-discovered.
* If you want to include the settings page in the default Eclipse Settings cluster to have all settings in one place, add the `getCluster()` method and return our cluster class (see below). You can also use any other cluster.

E.g.:

```php
<?php

namespace VendorName\MyPackage;

use Eclipse\Common\Foundation\Providers\PackageServiceProvider;
use Eclipse\Common\Package;
use Spatie\LaravelPackageTools\Package as SpatiePackage;

class MyPackageServiceProvider extends PackageServiceProvider
{
    public function configurePackage(SpatiePackage|Package $package): void
    {
        $package->name('my_package')
            ->hasSettings();
    }
    
    public static function getCluster(): ?string
    {
        return app(CommonPlugin::class)->getSettingsCluster();
    }
}
```

### Permissions
To make use of Filament Shield plugin and limit the users allowed to open the settings page and change settings, add the `HasPageShield` trait to your settings page.

```php
<?php

namespace VendorName\MyPackage\Filament\Pages;

use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Pages\SettingsPage;

class ManageMyPackage extends SettingsPage
{
    use HasPageShield;

    ...
}
```
### Caching
See the [laravel-settings cache section](https://github.com/spatie/laravel-settings?tab=readme-ov-file#caching-settings).

Enable the settings cache by setting `SETTINGS_CACHE_ENABLED` to `true` in your `.env` file.     
When you change settings (or update your packages that contain settings), clear the cache by running:
```shell
php artisan settings:clear-cache
```
... or our own:
```shell
php artisan eclipse:clear
```
... which also clears the settings cache, among other caches.

### Translatable settings
The laravel-settings package does not include translatable support for settings.

ATM, Eclipse does not require it, but it should be possible to solve the problem like this:
* Create a new translatable model, e.g. `CatalogueTexts` with a resource class (also tied to a tenant/site)
* Have a `translatableTexts` or similar attribute in the settings class, which is a `CatalogueTexts` object, which is set by a selectable input.

This method also allows better content separation, so that a translator or editor can be given permission to translate stuff without having permission to change critical app/plugin config, which is usually only done by super-admins.
