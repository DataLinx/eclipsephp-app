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

## DNS setup
When using Lando for local development, the project domain will be hosted at a `*.lndo.site` subdomain.
If you are not happy with this, or if for some reason this does not work for you (e.g. disabled [DNS rebinding](https://docs.lando.dev/help/dns-rebind.html)), we recommend you set up DNSMasq.
### Linux
1. Install it:
- with dnf (Fedora, RHEL...)
    ```shell
    sudo dnf install dnsmasq
    ```
- with apt (Ubuntu, Debian...)
    ```shell
    sudo apt install dnsmasq
    ```

2. Configure it:

    Add `address=/lndo.site/127.0.0.1` to `/etc/dnsmasq.d/lando.conf`.

3. Enable it:
    ```shell
    sudo systemctl enable --now dnsmasq
    ```

### Mac
See the Lando guide [here](https://docs.lando.dev/guides/offline-dev.html).


