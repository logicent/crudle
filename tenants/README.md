**_Note: This is experimental multi-tenancy support!_**

### Introduction

**Overview**

Add support for multi-tenancy using shared code and separate database per tenant, but also allow for tenant-specific extensions of app modules and/or separate tenant-only modules.

**Installation**

Prerequisites

Option 1: via Script
- Run `init` script via command-line

Option 2: via Commands
- Run `crudle tenant/create-new --id='new_customer'`

Continue:
- Run `./crudle tenant/migrate --migration-path 'tenants/<tenant_name>/<module_name>/migrations'`
- Run `./crudle serve -t tenants/<tenant_name>/web` in local environment or use a web server in production

### System Architecture

**Context**

It is desirable for ease of deployment and maintenance to host multiple tenant instances via a shared code base while keeping the data separate either using a database per tenant or new table + prefix for tenant in database.

**Containers**
- Tenant instance {tenant_name}   (Ins)
- {tenant_name}/modules   (Mod)

**Components**

_Storage_ - to provide customer-specific database backups and runtime dumps

_Web_ - to provide customer-specific entry script, assets cache and uploads

_Custom modules_

**Web Servers**
- PHP built-in web server via `./crudle serve -t tenants/<tenant_name>/web` (Development)
- Nginx via PHP-FPM (Production)

### Roadmap
_Now:_
- [ ] Create init script to deploy a new tenant and commands to manage existing instances

_Next:_

_Later:_