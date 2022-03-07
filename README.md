**_Note: This is a beta version of the software. You are advised to proceed with caution!_**

### Introduction

**Overview**

A free and open-source enterprise application starter kit for web development projects.

**Installation**

Prerequisites
- Git
- Composer
- NPM

Option 1: via Composer
- Run `composer create-project logicent/yii2-crudle && cd logicent`

Option 2: via CLI
- Clone this repo `git@github.com:logicent/yii2-crudle.git && cd logicent`

Continue:
- Run `composer install`
- Run `npm install -g bower && npm install -g bower-npm-resolver`
- Run `bower install`
- Create a database and update your `.env` settings
- Run `./yii migrate --migration-path 'app/database/migrations'`
- Run `cat app/database/seeds/people.sql | mysql -u your_root_user -p your_db_name`
- Run `./yii user/create-superuser "my_password"` and `./yii rbac/init`
- Run `./yii serve` in local environment or use preferred web server in production

**System Requirements**
- PHP 7.4 using Yii2 (latest) and JavaScript using jQuery (latest)
- MySQL 5.7
- Semantic UI 2.4
- Datatables 1.10
- Flatpickr 4.6
- SweetAlert 2.1

**Setup**
  - Business profile
  - Email notifications
  - Email queue
  - General settings
  - Role & permissions

**Tools**
- Data import
- Database backup
- Report builder
- SMTP settings

### System Architecture

**Context**

Yii2 Crudle (CRUD logic engine) is a meta framework for rapid application development and customization using a modified (basic) template, predefined coding conventions and fully-fledged admin backend based on Semantic UI.

**Containers**
- backend   (App)
- builder   (Kit)
- modules   (Ext)

**Components**
- kit
  - config
  - enums
  - helpers
  - widgets

**Code**
- role/load-defaults
- role/create
- user/create
- setup/init-auth
- email/send-notification
- site/home
- site/login
- site/logout
- site/change-password
- site/forgot-password
- site/request-password-reset
- site/reset-password

### Technology Stack
**Programming Languages and Frameworks**
- PHP 7.4 using Yii2 (latest) and JavaScript using jQuery (latest)
- Yii2-dockerized (optional)

**Templating**
- Twig

**Databases Supported**
- MySQL 5.7
- SQLite

**UI Frameworks, Components and Libraries**
- jQuery and Htmx 2
- Fullcalendar 5.3

**Web Servers**
- PHP built-in web server via `./yii serve` or Caddy 2 (Development)
- Nginx or RoadRunner 2 (Production)

**Process Manager**
- Development
- Production

**Job Queues**
- Redis

**Caching**
- Redis

**Realtime**
- Web sockets

**Command Line**
- _To be determined_

### Domain-driven
Use domain-driven project structure that maps to modified Yii2 modules and extensions

- Domain/
  - Actions/
  - Enums/
  - Exceptions/
  - Models/
  - Rules/
  - Status/
  - ValueObject/

**Context**
- Content (Input/Output)
- Reports (Output)
- Settings (Parameters)
- Tools

**UI Components**
- Forms
- Panel (Containers)
- Data
- Overlay
- Menu
- Charts
- Button
- File
- Multimedia
- Messages
- Miscellaneous

**Data Storage**
- Yaml  (predefined values)
- Json  (app/user data)
- Csv   (import/export)
- Md    (page content)
- Sqlite
- MySQL/Postgres
- Redis

**Authentication**
- Hybrid of Php Auth Manager and Db Auth Manager*
- Administrator and System manager roles are predefined

### Roadmap
_Now:_
- [ ] Email sending with attachment option for documents and reports
- [ ] Email templates and email digest of recent business activity
- [ ] Improve all the end-user system tools options and performance

_Next:_
- [ ] Upgrade to latest Yii2 using PHP 8+ and MySQL 8+ with Fomantic UI 2.8+
- [ ] Change the UI layout to full-width with primary and secondary sidebars
- [ ] Create Yii extensions for the tools and starter kit as composer packages

_Later:_
- [ ] Upgrade to Yii3 (with CycleORM datamapper) using Bulma and AlpineJS
- [ ] Test and prefer RoadRunner over Nginx for production in Ubuntu 20.04+
- [ ] Development via Yii2-dockerized - _PoC done_
- [ ] Add multi-tenant project structure and init script - _PoC done_
- [ ] Use hybrid of Php Auth Manager _(predefined)_ and Db Auth Manager _(user-defined)_
- [ ] Testing - look into PestPHP but keep an open mind on the way forward
- [ ] Deploying using deployer.org (optional)

**Want to contribute?**
Thank you for considering to make a contribution to Yii2 Crudle.
New contributors to improve the solution further or help provide support to issues are most welcome.

**License**
Yii2 Crudle is released under the [BSD-3-Clause](https://opensource.org/licenses/BSD-3-Clause).