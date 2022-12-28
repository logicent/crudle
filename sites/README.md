**_Note: This is experimental multi-tenancy support!_**

### Introduction

**Overview**

Add support for multi-tenancy using shared code and separate database per site, but also allow for site-specific extensions of app modules and/or separate site-only modules.

**Installation**

Prerequisites

Option 1: via Script
- Run `init` script via command-line

Option 2: via Commands
- Run `crudle sites/create-new --id='site_name'`

Continue:
- Create a database and update your site `sites/<site_name>/.env` settings
- See [yii2-crudle](https://github.com/logicent/yii2-crudle) for migrations, seeds and new user creation steps
- Run `./crudle serve -t sites/<site_name>/web` in local environment or use preferred web server in production

### System Architecture

**Context**

It is desirable for ease of deployment and maintenance to host multiple tenant instances via a shared code base while keeping the data separate either using a database per tenant or new table + prefix for tenant in database.

**Containers**
- Site instance {site_name}
- User modules  {site_name}/modules

**Components**

_config_ - to define global application configs and site-specific settings

_storage_ - to provide customer-specific database backups and runtime dumps

_web_ - to provide customer-specific entry script, assets cache and uploads

_Custom modules_

**Web Servers**
- PHP built-in web server via `./crudle serve -t sites/<site_name>/web` (Development)

### Roadmap
_Now:_
- [ ] Create init script to deploy a new site and commands to manage existing sites

_Next:_

_Later:_