---
# https://vitepress.dev/reference/default-theme-home-page
layout: home

hero:
  name: "Eclipse"
  tagline: Developer documenation
  actions:
    - theme: brand
      text: Introduction
      link: /introduction/requirements
    - theme: alt
      text: Development
      link: /plugin-development/setting-up

features:
  - title: 💡 Built with Filament and Laravel
    details: The app is built with Filament, Laravel and other PHP community favourite frameworks and tools.
  - title: 💻 DevOps ready
    details: The app includes a full Lando config to make development easier with Docker, zsh, supervisor, cron... Start it up and get coding!
  - title: 🏢 Multi-tenancy and localization
    details: Eclipse is pre-set with multi-tenancy out-of-the-box (tenant = site). Therefore, by default, it's a multi-site multi-language system.
  - title: ⚡ Batteries included
    details: We already added and configured Horizon, Typesense, Telescope, roles and permissions and other popular packages.
---


## About
Eclipse is a PHP app built with Filament and the [TALL stack](https://tallstack.dev/). Its purpose is to offer a solid platform on a modern stack upon which custom web apps can be built. Apart from being compatible with Filament plugins, it aims to offer a set of pre-built modules and other generic components which allow a web app for custom project needs to be built quickly and efficiently with little or no boilerplate code.

It's being developed by [DataLinx](https://www.datalinx.si/), a company in Slovenia/EU, for use in client and own web projects. It's currently in pre-alpha development stage.

### Out-of-the-box features
* User management
* Roles and permissions
* Domain based multi-tenancy (multi-sites)
* Multi-language
* Compatible with standard Laravel and Filament packages

<figure>
    <a href="https://github.com/DataLinx/eclipsephp-app/actions/workflows/test-runner.yml">
        <img src="https://github.com/DataLinx/eclipsephp-app/actions/workflows/test-runner.yml/badge.svg" alt="Tests" style="display: inline; margin-right: 5px;">
    </a>
    <a href="https://conventionalcommits.org">
        <img src="https://img.shields.io/badge/Conventional%20Commits-1.0.0-%23FE5196?logo=conventionalcommits&logoColor=white" alt="Conventional Commits" style="display: inline; margin-right: 5px">
    </a>
    <img src="https://img.shields.io/github/license/DataLinx/eclipsephp-app" alt="Licence" style="display: inline;">
</figure>
