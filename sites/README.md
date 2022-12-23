**_Note: This is experimental multi-tenancy support!_**

### Introduction

**Overview**

Add support for multi-tenancy using shared code and separate database per site, but also allow for site-specific extensions of app modules and/or separate site-only modules.

**Installation**

Prerequisites

Option 1: via Script
- Run `init` script via command-line

Option 2: via Commands
- Run `crudle sites/create-new --id='new_customer'`

Continue:
- Run `./crudle sites/migrate --migration-path 'sites/<site_name>/<module_name>/migrations'`
- Run `./crudle serve -t sites/<site_name>/web` in local environment or use a web server in production

### System Architecture

**Context**

It is desirable for ease of deployment and maintenance to host multiple tenant instances via a shared code base while keeping the data separate either using a database per tenant or new table + prefix for tenant in database.

**Containers**
- Site instance {site_name}   (Ins)
- {site_name}/modules   (Mod)

**Components**

_Storage_ - to provide customer-specific database backups and runtime dumps

_Web_ - to provide customer-specific entry script, assets cache and uploads

_Custom modules_

**Web Servers**
- PHP built-in web server via `./crudle serve -t sites/<site_name>/web` (Development)
- Nginx via PHP-FPM (Production)

### Roadmap
_Now:_
- [ ] Create init script to deploy a new site and commands to manage existing sites

_Next:_

_Later:_