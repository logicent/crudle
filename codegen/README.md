<p align="center">
    <a href="https://github.com/logicent" target="_blank">
        <img src="https://placeholder.it" height="100px">
    </a>
    <h1 align="center">Kit Module for Crudle</h1>
    <br>
</p>

This module provides a builtin code generator, called Kit, for [Crudle 1.0](https://github.com/logicent/crudle) application starter kit.
You can use Kit to quickly generate models, forms, modules, CRUD, etc.

For license information check the [LICENSE](LICENSE.md)-file.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://poser.pugx.org/logicent/yii2-kit/v/stable.png)](https://packagist.org/packages/logicent/yii2-kit)
[![Total Downloads](https://poser.pugx.org/logicent/yii2-kit/downloads.png)](https://packagist.org/packages/logicent/yii2-kit)
[![Build Status](https://travis-ci.org/logicent/yii2-kit.svg?branch=master)](https://travis-ci.org/logicent/yii2-kit)


Installation
------------

The preferred way to install this module is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --dev --prefer-dist logicent/yii2-kit
```

or add

```
"logicent/yii2-kit": "~2.0.0"
```

to the require-dev section of your `composer.json` file.


Usage
-----

Once the module is installed, simply modify your application configuration as follows:

```php
return [
    'bootstrap' => ['kit'],
    'modules' => [
        'kit' => [
            'class' => 'crudle\kit\Module',
        ],
        // ...
    ],
    // ...
];
```

You can then access Kit through the following URL:

```
http://localhost/path/to/index.php?r=kit
```

or if you have enabled pretty URLs, you may use the following URL:

```
http://localhost/path/to/index.php/kit
```

Using the same configuration for your console application, you will also be able to access Kit via
command line as follows,

```
# change path to your application's base path
cd path/to/AppBasePath

# show help information about Kit
yii help kit

# show help information about the model generator in Kit
yii help kit/model

# generate City model from city table
yii kit/model --tableName=city --modelClass=City
```
