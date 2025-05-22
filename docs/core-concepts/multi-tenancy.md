# Multi-tenancy

Eclipse (app and core) is pre-set with multi-tenancy out-of-the-box, where **a tenant is a site with its domain**. Therefore, by default, it's a multi-site system.

Regardless, all our plugins (excluding the core) support multi-tenancy to be either enabled or disabled and allow a custom tenant model. So by using our plugins, we do not force a certain tenancy setup.

The multi-site feature in Eclipse can be disabled or enabled via the config option or the `ECLIPSE_MULTI_SITE` variable in the `.env` file.

1. When multi-site is **enabled**, the default core seeder will use the seeder config from the `eclipse` config file. Multi-site elements are disabled in the UI.
2. When multi-site is **disabled**, the default core seeder will create only the default site, and the multi-site elements are hidden from the UI.

In any case, the underlying data model is always the same, allowing easy enabling/disabling of the multi-site feature, without database migrations or additional setup.
