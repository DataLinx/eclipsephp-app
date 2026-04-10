# Localization (L10n)

Localization is a crucial aspect of plugin development, as it allows your plugin to be used by a global audience.

## Laravel basics
### Setting the default locale
The default locale is set in the application configuration file, which is located at `config/app.php`. The default locale is defined by the `locale` key.

You can also change the default locale by setting the `APP_LOCALE` environment variable in the `.env` file.

### Getting the current locale
You can get the current locale using the `app()->getLocale()` method.

### Changing the current locale
You can change the current locale using the `app()->setLocale()` method.

Read more on the Laravel documentation localization page [here](https://laravel.com/docs/localization).

## Available locales
The first thing to note is that the available locales are provided with the common package; therefore, you must set your locales in the `eclipse-common` config file.

```php
     /*
     * Available locales for the application.
     * Can be a list (array) of locale codes or a closure that returns such an array.
     */
    'available_locales' => function () {
        return ['en', 'sl'];
    },
```
As the comment above states, you can either provide a list of locales or a closure that returns such a list if you need to dynamically set the locales.

## L10nHelper
The `L10nHelper` class is provided by the common package and provides a set of static methods for localization.

### `getAvailableLocales()`
The `getAvailableLocales()` method returns an associative array of available locales, where the element key is always the same as the value.

**Example:**
```php
[
    'en' => 'en',
    'sl' => 'sl',
]
```

### `getLocaleOptions()`
The `getLocaleOptions()` method returns an associative array of locales, where the element key is the locale code and the element value is the language name. This is useful for building select boxes or similar UI elements.

**Example:**
```php
[
    'en' => 'English',
    'sl' => 'Slovenian',
]
```
::: tip IMPORTANT
The language name is provided by the `intl` PHP extension; therefore, you must have it installed to use this method.
:::

### `getLanguageName(string $code, bool $include_code = false)`
The `getLanguageName()` method returns the language name from the language code.

**Examples:**
```php
L10nHelper::getLanguageName('en') // English
L10nHelper::getLanguageName('sl') // Slovenian
L10nHelper::getLanguageName('sl', true) // Slovenian (sl)
L10nHelper::getLanguageName('xx') // xx
```
1. If the `intl` PHP extension is installed, the method uses the `\Locale` class to get the language name.
2. Otherwise, it returns the language code.

