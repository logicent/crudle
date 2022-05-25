**_Note: This is a beta version of the software. You are advised to proceed with caution!_**

### Introduction

**Overview**

A free and open-source web development starter kit for building ready to go enterprise applications.

**Installation**

Prerequisites
- Git
- Composer
- NPM

Option 1: via Composer
- Run `composer create-project logicent/yii2-crudle:dev-main && cd logicent`

Option 2: via CLI
- Run `git clone git@github.com:logicent/yii2-crudle.git && cd logicent`
- Run `composer install`

Continue:
- Run `npm install -g bower && npm install -g bower-npm-resolver`
- Run `bower install`
- Create a database and update your `.env` settings
- Run `./crudle migrate --migration-path 'app/database/migrations'`
- Run `cat app/database/seeds/people.sql | mysql -u your_root_user -p your_db_name`
- Run `./crudle user/create-superuser "my_password"` and `./crudle rbac/init`
- Run `./crudle serve -t web` in local environment or use preferred web server in production

### System Architecture

**Context**

Yii2 Crudle (CRUD logic engine) is a meta framework for rapid application development and customization using a modified project template, some predefined coding conventions and a fully-fledged admin backend built with Semantic UI.

**Containers**
- backend   (App)
- codegen   (Kit)
- modules   (Ext)

**Components**

_Main module_

- **Dashboard** - view the dashboards created using the dashboard + data widget tools in setup
- **Home** - view the default workspace customized in setup to show shortcuts and data widgets
- **Report** - view the reports created using the report builder to show filtered query result

_Setup module_

- **System** - create/modify app modules, data models & configure core settings
- **Data Tool** - import data, create data widgets, reports & configure backups
- **Email Sending** - create email notifications, templates, check email queues
- **Layout Settings** - create layout navbar menus and dashboard menu shortcuts
- **People** - add users, user groups, roles and permissions and view user logs
- **Printing** - create print styles, print formats and configure print devices

**Code**
- **app/config** to define app-level conventions
- **app/database** to run db scripts that update db migrations published in modules
- **app/enums** to define app-level enumerations
- **app/helpers** to provide reusable functionality
- **app/modules** to contain the core functionality
- **app/modules/main** to manage the core app-level interaction like authentication
- **app/modules/setup** to provide visibility and customization tools for end-users
- **modules/web_cms** to easily setup a front-end site for users to engage with you

### Technology Stack
**Programming Languages and Frameworks**
- PHP 7.4 using Yii2 _(latest)_ and JavaScript using jQuery _(latest)_
- Yii2-dockerized _(optional)_

**Templating**
- Twig _(to consider)_

**Databases Supported**
- MySQL 5.7
- SQLite (offline) _(todo later)_

**UI Frameworks, Components and Libraries**
- jQuery
- HTMX 2  _(todo later)_
- Fullcalendar 5.3  _(todo next)_
- LeafletJS 1.8  _(todo next)_

**Web Servers**
- PHP built-in web server via `./crudle serve -t web` (Development)
- Nginx (Production)

**Process Manager**  _(to consider)_
- Development
- Production

**Job Queues**
- Redis _(todo later)_

**Caching**
- Redis _(todo later)_

**Realtime**
- Web sockets using HTMX 2 _(todo later)_

**Command Line**
- _To be determined_

### Roadmap
_Now:_
- [ ] Increase the UI layout width, add a pinable sidebar and editable menus
- [ ] Improve all the end-user system tools options and performance
- [ ] Email templates and email sending with attachment option for documents and reports

_Next:_
- [ ] Upgrade to latest Yii2 using PHP 8+ and MySQL 8+ with Fomantic UI 2.8+
- [ ] Create Yii extensions for the tools and starter kit as composer packages
- [ ] Add multi-tenant project structure and init script - _PoC done_

_Later:_
- [ ] Upgrade to Yii3 (with CycleORM datamapper) using Bulma and HTMX/AlpineJS
- [ ] Use hybrid of Php Auth Manager _(predefined)_ and Db Auth Manager _(user-defined)_
- [ ] Test and prefer RoadRunner 2 over Nginx for production in Ubuntu 20.04+
- [ ] Testing - look into PestPHP but keep an open mind on the way forward
- [ ] Development via Yii2-dockerized - _PoC done_
- [ ] Deploying using deployer.org (optional)

**Want to contribute?**
Thank you for considering to make a contribution to Yii2 Crudle.
New contributors to improve the solution further or help provide support to issues are most welcome.

**License**
Yii2 Crudle is released under the [BSD-3-Clause](https://opensource.org/licenses/BSD-3-Clause).