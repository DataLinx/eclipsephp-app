# Getting started
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
