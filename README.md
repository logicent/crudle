**_Note: This is a beta version of the software. You are advised to proceed with caution!_**

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

**Setup (Settings)**
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

**Roadmap**

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

**Want to contribute?**
Thank you for considering to make a contribution to Yii2 Crudle.
New contributors to improve the solution further or help provide support to issues are most welcome.

**License**
Yii2 Crudle is released under the [BSD-3-Clause](https://opensource.org/licenses/BSD-3-Clause).