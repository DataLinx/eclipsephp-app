# Setting up

Plugin development is not yet fully self-contained, meaning you need the app skeleton, where you will add the plugin you want to develop as a dependency that is symlinked from a local folder.  
However, this is needed only if you want to manually test the plugin in the app (in your browser), since running the tests uses a default Testbench Laravel skeleton.
 
::: tip Please note
The core package is in fact not a Filament plugin, but nevertheless, everything for plugin development also applies for core development.
:::

1. Follow the [Getting started](/introduction/getting-started) section to set up an app skeleton.
2. Then, `git clone` the plugin you want to work on to a local folder inside the app, e.g. `packages/my-package`.
3. Add the local folder as a repository in the app's `composer.json`, e.g.:
    ```
    "repositories": [
        {
            "type": "path",
            "url": "./packages/my-package"
        }
    ]
    ```
4. Run `composer update` to create the symlink.
