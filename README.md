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
- Create a database and update `sites/.env` settings
- Run `./crudle migrate --migrationPath sites/database/migrations'`
- Run `cat sites/database/scripts/crdl_People.sql | mysql -u <my_root_user> -p <my_db_name>`
- Run `./crudle user/create-superuser 'my_password'` and `./crudle rbac/init`
- Run `./crudle serve -t sites/web` in local environment or use preferred web server in production

### System Architecture

**Context**

Yii2 Crudle (CRUD logic extensions) is a meta framework for rapid application development and customization using a modified project template, some predefined coding conventions and a fully-fledged admin backend built with Fomantic UI.

**Containers**
- backend   (App)
- codegen   (Kit)
- modules   (Ext)

**Components**

_Main page_ - to provide custom interaction components built for end-users
- **Workspace** - view the workspaces created to show favorite menus and widgets
- **Dashboard** - view the dashboards created using the dashboard + widgets tool
- **Report** - view the reports created with report builder to show query result

_Setup page_ - to provide visibility and customization tools for end-users
- **System** - configure general settings and layout (UI) preferences and menus
- **Data Tool** - import and/or export data, create/modify domain master models
- **Email Sending** - create email notifications, templates, check email queues
- **Data Storage** - configure backups and manage file storage and system cache
- **People** - add users, user groups, roles and permissions and view user logs
- **Printing** - create print styles, print formats and configure print devices

_App modules_ - contains core app functionality like auth, crud, email, map etc
- **backend/database** provides tool to interact with DB connection and storage
- **backend/main** to define app-level enums and provide reusable app functions
- **backend/listing** to display a set of records in multi-record visualization
- **backend/workflow** to define approval routing, change triggers and statuses

_Ext modules_
- **modules/web_cms** - to set up a website for data publishing and interaction

_Sites_
- **sites/config** to define global config settings
- **sites/database** to define DB scripts and seeds
- **sites/storage** to hold shared data & resources
- **sites/web** to define global JS and CSS scripts

### Technology Stack
**Programming Languages and Frameworks**
- PHP 8.0 using Yii2 and JavaScript using jQuery
- Yii2-crudle dockerized _(optional - todo later)_
- Deploy via deployer _(optional - todo later)_

**Templating**
- Twig _(to consider)_

**Databases Supported**
- MySQL 8.0 (or equivalent MariaDB version)
- SQLite _(to be tested)_
- PostgreSQL _(todo later)_
- SQLite (offline) _(todo later)_

**UI Frameworks, Components and Libraries**
- Fomantic UI 2.9
- HTMX 2
- Fullcalendar 5.11
- LeafletJS 1.9

**Web Servers**
- PHP built-in web server via `./crudle serve -t sites/web` (Development)
- Nginx via PHP-FPM (Production)
- RoadRunner 2 _(todo later)_

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
- Using built-in commands via console app

### Roadmap
_Now:_
- [x] Increase the UI layout width, add a pinable sidebar and editable menus
- [x] Improve all the end-user system tools, app preferences and performance
- [x] Upgrade to latest Yii2 using PHP 8.0 and MySQL 8.0 and Fomantic UI 2.9

_Next:_
- [x] Add multi-tenant (sites) support in template + init script for instances
- [ ] Email templates for sending mails + attachments of documents and reports
- [ ] Print templates and formatting styles (script) for documents and reports
- [ ] Create Yii extensions for the tools and starter kit as composer packages

_Later:_
- [ ] Write UI, workflows and DB tests using either PestPHP or PHPUnit
- [ ] Use hybrid of Php Auth Manager _(predefined)_ and Db Auth Manager _(user-defined)_
- [ ] Upgrade to Yii3 (with CycleORM datamapper) using Bulma and Buefy

**Want to contribute?**
Thank you for considering to make a contribution to Yii2 Crudle.
New contributors to improve the solution further or help provide support to issues are most welcome.

**License**
Yii2 Crudle is released under the [BSD-3-Clause](https://opensource.org/licenses/BSD-3-Clause).