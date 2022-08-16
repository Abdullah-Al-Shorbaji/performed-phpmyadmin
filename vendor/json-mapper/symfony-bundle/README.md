![Logo](https://jsonmapper.net/images/jsonmapper.png)
---
**This is a Symfony bundle for using JsonMapper in you Symfony application.** 

JsonMapper is a PHP library that allows you to map a JSON response to your PHP objects that are either annotated using doc blocks or use typed properties.
For more information see the project website: https://jsonmapper.net

![GitHub](https://img.shields.io/github/license/JsonMapper/SymfonyBundle)
![Packagist Version](https://img.shields.io/packagist/v/json-mapper/symfony-bundle)
![PHP from Packagist](https://img.shields.io/packagist/php-v/json-mapper/symfony-bundle)
![Build](https://github.com/JsonMapper/SymfonyBundle/workflows/Build/badge.svg?branch=master)
[![Coverage Status](https://coveralls.io/repos/github/JsonMapper/SymfonyBundle/badge.svg?branch=master)](https://coveralls.io/github/JsonMapper/SymfonyBundle?branch=master)

# Why use JsonMapper
Continuously mapping your JSON responses to your own objects becomes tedious and is error prone. Not mentioning the
tests that needs to be written for said mapping.

JsonMapper has been build with the most common usages in mind. In order to allow for those edge cases which are not 
supported by default, it can easily be extended as its core has been designed using middleware.

JsonMapper supports the following features
 * Case conversion
 * Debugging
 * DocBlock annotations
 * Final callback
 * Namespace resolving
 * PHP 7.4 Types properties
  
# Installing JsonMapper Symfony bundle 
The installation of JsonMapper Symfony bundle can easily be done with [Composer](https://getcomposer.org)
```bash
$ composer require json-mapper/symfony-bundle
```
The example shown above assumes that `composer` is on your `$PATH`.

# Contributing
Please refer to [CONTRIBUTING.md](https://github.com/JsonMapper/SymfonyBundle/blob/master/CONTRIBUTING.md) for information on how to contribute to JsonMapper Symfony bundle.

## List of Contributors
Thanks to everyone who has contributed to JsonMapper Symfony bundle! You can find a detailed list of contributors of JsonMapper on [GitHub](https://github.com/JsonMapper/SymfonyBundle/graphs/contributors).

# License
The MIT License (MIT). Please see [License File](https://github.com/JsonMapper/SymfonyBundle/blob/master/LICENSE) for more information.
