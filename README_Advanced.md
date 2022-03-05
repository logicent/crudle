**Context**

Yii2 Crudle (CRUD logic engine) is a meta framework for rapid application development and customization using a modified (advanced) template, predefined coding conventions and fully-fledged admin backend based on Semantic UI.

**Containers**

- backend   (App)
- service   (Api)
- console   (Cli)
- builder   (Kit)
- website   (Web)

**Components**

- api
  - config
    - api
    - url
  - controllers
  - enums
  - models (optional)

- cli
  - config
    - cli
  - controllers
    - EmailQueueController
    - PermissionController
    - RoleController
    - SetupController
    - UserController
  - enums
  - helpers
  - models (optional)

- kit
  - config
    - kit
  - controllers
    - DataModelController
    - DataModelFieldController
  - enums
    - DataType
    - ModelType
  - helpers
  - models
    - DataModel
    - DataModelField
  - views
    - data_model
        - field
  - widgets

- web
  - config
    - db (optional)
    - url
    - web
  - controllers
    - HomeController
    - SiteController (with actions) or action controller like LoginController
  - models
  - views
    - home
    - site
