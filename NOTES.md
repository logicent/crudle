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

**Data Storage**
- Yaml  (predefined values)
- Json  (app/user data)
- Csv   (import/export)
- Md    (static content)
- Sqlite (offline)
- MySQL/Postgres (database)
- Redis (caching)

**Authentication**
- Hybrid of Php Auth Manager and Db Auth Manager*
- Administrator and System manager roles are predefined

**UI Components**
- Forms
- Widgets
- Menus
- Charts
- Buttons
- Files
- Messages