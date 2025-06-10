# Architecture

The Eclipse application core is composed of the following internal packages:

| Package    | Purpose                        | Dependencies                |
|------------|--------------------------------|-----------------------------|
| `app`      | App skeleton.                  | `core`                      |
| `core`     | Core package with admin panel. | `common`<br/>`world-plugin` |
| `frontend` | Panel plugin for frontend.     | `core`                      |

* These packages are opinionated, but they are open-source and publicly accessible.
* It's safe to assume they would be used only internally.
* They only target our current PHP version (8.3).
* In a perfect world, they would contain as little code as possible. Instead, it is desirable to create Filament plugins or PHP/Laravel packages.

## Distributable packages/plugins

These packages/plugins are also part of the main app packages, but are also meant for distribution and are usable in other Filament projects. 
* They *may* force some common third-party dependencies like Filament Shield, but these are carefully chosen — only actively maintained and free packages are considered.
* They *should* support multiple PHP (8.2+), Laravel (L11+) and Filament (3+) versions.

| Package        | Purpose                                                                                                                                                               | Dependencies | PHP version |
|----------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------|--------------|:------------|
| `common`       | Common code that is distributable and required by all our plugins.<br/>It can be opinionated, but does not force any decision that conflicts with other dependencies. | N/A          | ^8.2        |
| `world-plugin` | Plugin with common geographical data (countries, regions, posts ...).                                                                                                 | `common`     | ^8.2        |
