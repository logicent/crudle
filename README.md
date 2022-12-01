**_Note: This is a beta version of the software. You are advised to proceed with caution!_**

### Introduction

**Overview**

A free and open source web development starter kit for building ready to go enterprise applications.

**Installation**

Prerequisites
- Git
- Composer
- NPM

Option 1: via Composer
- Run `composer create-project logicent/yii2-crudle:dev-main && cd yii2-crudle`

Option 2: via CLI
- Run `git clone git@github.com:logicent/yii2-crudle.git && cd yii2-crudle`
- Run `composer install`

Continue:
- Create a database and update your `.env` settings
- Run `./crudle migrate --migration-path 'app/database/migrations'`
- Run `cat app/database/seeds/crdl_People.sql | mysql -u <my_root_user> -p <my_db_name>`
- Run `./crudle user/create-superuser 'my_password'` and `./crudle rbac/init`
- Run `./crudle serve -t web` in local environment or use preferred web server in production

### System Architecture

**Context**

Yii2 Crudle (CRUD logic engine) is a meta framework for rapid application development and customization using a modified project template, some predefined coding conventions and a fully-fledged admin backend built with Fomantic UI.

**Containers**
- backend   (App)
- codegen   (Kit)
- modules   (Ext)

**Components**

_Main module_ - to manage the core app-level interaction like authentication
- **Home** - view the default workspace customized to show shortcuts and data widgets
- **Dashboard** - view the dashboards created using the dashboard + data widget tools
- **Report** - view the reports created using the report builder to show query result

_Setup module_ - to provide visibility and customization tools for end-users
- **System** - configure general settings and layout (UI) preferences and menus
- **Data Tool** - import and/or export data, create/modify domain master models
- **Email Sending** - create email notifications, templates, check email queues
- **Data Storage** - configure backups and manage file storage and system cache
- **People** - add users, user groups, roles and permissions and view user logs
- **Printing** - create print styles, print formats and configure print devices

_Main app_
- **app/config** to define app-level conventions
- **app/database** to contain db scripts that run db migrations
- **app/enums** to define app-level enumerations
- **app/helpers** to provide reusable app functions
- **app/modules** to contain core app functionality

_Extension modules_
- **modules/web_cms** to easily setup a front-end site for users to engage with you

### Technology Stack
**Programming Languages and Frameworks**
- PHP 7.4 using Yii2 _(latest)_ and JavaScript using jQuery _(latest)_
- To-Do: Yii2-dockerized _(optional)_

**Templating**
- Twig _(to consider)_

**Databases Supported**
- MySQL 5.7
- SQLite (offline) _(todo later)_

**UI Frameworks, Components and Libraries**
- HTMX 2 _(wip)_
- Fullcalendar 5.x _(todo later)_
- LeafletJS 1.8 _(todo later)_

**Web Servers**
- PHP built-in web server via `./crudle serve -t web` (Development)
- Nginx (Production)

**Process Manager** _(to consider)_
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
- [x] Increase the UI layout width, add a pinable sidebar and editable menus
- [x] Improve all the end-user system tools, app preferences and performance
- [ ] _wip:_ Upgrade to latest Yii2 using PHP 8+ and MySQL 8+ with Fomantic UI 2.9+

_Next:_
- [ ] Create Yii extensions for the tools and starter kit as composer packages
- [ ] Email templates for sending mail with attachments for documents and reports
- [ ] Add multi-tenant project structure and init script - _PoC done_

_Later:_
- [ ] Upgrade to Yii3 (with CycleORM datamapper) using Bulma and Buefy
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