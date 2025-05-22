# Search

Eclipse plugins are already integrated with the global search and Typesense.

## Set up Scout and Typesense
In the default Eclipse app, Typesense is already configured as the Laravel Scout driver.

However, in case you need to add Typesense to an existing project, first add the service specification in your Lando file:
```yaml
services:
  typesense:
    type: typesense:28.0
    portforward: 8108
    apiKey: abc
```
Rebuild the container with `lando rebuild -y`.

Secondly, follow the Scout installation instructions [here](https://laravel.com/docs/scout#installation), but do not change your model — this is done later below.

Then, set the same API key in your `.env` file and use `typesense` as host.
```dotenv
SCOUT_DRIVER=typesense
SCOUT_QUEUE=true

TYPESENSE_API_KEY=abc
TYPESENSE_HOST=typesense
```
The Typesense service will now be running and ready to use by your app.

## Preparing the model for search
1. Add the `Eclipse\Common\Foundation\Models\IsSearchable` trait to your model class (e.g. `Product`).
2. Implement the `getTypesenseSettings()` method in your model. For the key-value format, follow the [Laravel Scout docs](https://laravel.com/docs/scout#preparing-data-for-storage-in-typesense).  
   See our [Product specification here](https://github.com/DataLinx/eclipsephp-catalogue-plugin/blob/98a0d4e35741d28c010c1a5a56de5b2cf34a8dbf/src/Models/Product.php#L48) in the catalogue plugin for a working example.  
   Notes:
    * See Typesense docs for the `collection-schema` specification [here](https://typesense.org/docs/28.0/api/collections.html#schema-parameters).
    * [Here](https://typesense.org/docs/28.0/api/collections.html#field-types) are the available field types.
    * Translatable attributes should be specified with a dot-underscore-asterisk notation, e.g. `name_.*` for the field name parameter, and with underscore-asterisk only for the `search-parameters` array.
3. Add the model settings to the Scout config.  
   In your service provider `register` method, inject your model's settings into the `scout.typesense.model-settings` config array, e.g.:
   ```php
   public function register()
   {
        parent::register();

        $settings = Config::get('scout.typesense.model-settings', []);

        $settings += [
            Product::class => Product::getTypesenseSettings(),
            // More models here...
        ];

        Config::set('scout.typesense.model-settings', $settings);
   }
   ```

## Enabling search in Filament controllers
1. Add the `Eclipse\Common\Foundation\Pages\HasScoutSearch` trait to your Filament `List` controller (e.g. `ListProducts`).
2. Add the `->searchable()` method call to your table definition in your Filament `Resource` class (e.g. `ProductResource`).
    ```php
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),

                TextColumn::make('name')
                    ->toggleable(false),
            ])
            ->searchable();
    }
    ```
3. Implement the `getGloballySearchableAttributes()` method in the `Resource` class to enable global search for the model, e.g.:
    ```php
    public static function getGloballySearchableAttributes(): array
    {
        return [
            'code',
            'barcode',
            'manufacturers_code',
            'suppliers_code',
            'name',
            'short_description',
            'description',
        ];
    }
    ```

## Indexing
Indexing happens on the fly when a model is saved, thanks to the `IsSearchable` trait.  
However, when initially setting things up for an existing model with records in the database, you need to run the batch import. For our `Product` model, you could do that in the console like so:
```shell
  php artisan scout:import "Eclipse\Catalogue\Product"
```
Read more about indexing in the Laravel docs [here](https://laravel.com/docs/scout#indexing).

## Debugging
To better understand and help you debug any problems you may encounter when implementing search with Typesense, you can use the Typesense Dashboard app that is available for all platforms [here](https://github.com/bfritscher/typesense-dashboard).  
To connect, use the parameters you specified in your Lando file.
