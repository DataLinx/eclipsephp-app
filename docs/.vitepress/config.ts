import {defineConfig} from 'vitepress'

// https://vitepress.dev/reference/site-config
export default defineConfig({
  base: '/eclipsephp-app/',
  title: "Eclipse documentation",
  description: "Documentation for Eclipse PHP app",
  head: [['link', { rel: 'icon', href: './logo-icon-only.svg' }]],
  themeConfig: {
    // https://vitepress.dev/reference/default-theme-config
    logo: './logo-icon-only.svg',
    nav: [
      {text: 'Home', link: '/'},
      {text: 'Introduction', link: '/introduction/requirements'},
    ],

    sidebar: [
      {
        text: 'Introduction',
        items: [
          {text: 'Requirements', link: '/introduction/requirements'},
          {text: 'Getting started', link: '/introduction/getting-started'},
          {text: 'Architecture', link: '/introduction/architecture'},
        ]
      },
      {
        text: 'Plugin development',
        items: [
          {text: 'Setting up', link: '/plugin-development/setting-up'},
          {text: 'Running tests', link: '/plugin-development/running-tests'},
          {text: 'Debugging', link: '/plugin-development/debugging'},
        ]
      },
      {
        text: 'Core Concepts',
        items: [
          {text: 'Multi-tenancy', link: '/core-concepts/multi-tenancy'},
          {text: 'Users', link: '/core-concepts/users'},
          {text: 'Search', link: '/core-concepts/search'},
          {text: 'Settings', link: '/core-concepts/settings'},
        ]
      },
    ],

    socialLinks: [
      {icon: 'github', link: 'https://github.com/DataLinx/eclipsephp-app'}
    ]
  }
})
