# Doctrine 2 Consistence

[![Build Status](https://img.shields.io/travis/iPublikuj/doctrine-consistence.svg?style=flat-square)](https://travis-ci.org/iPublikuj/doctrine-consistence)
[![Scrutinizer Code Coverage](https://img.shields.io/scrutinizer/coverage/g/iPublikuj/doctrine-consistence.svg?style=flat-square)](https://scrutinizer-ci.com/g/iPublikuj/doctrine-consistence/?branch=master)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/iPublikuj/doctrine-consistence.svg?style=flat-square)](https://scrutinizer-ci.com/g/iPublikuj/doctrine-consistence/?branch=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/ipub/doctrine-consistence.svg?style=flat-square)](https://packagist.org/packages/ipub/doctrine-consistence)
[![Composer Downloads](https://img.shields.io/packagist/dt/ipub/doctrine-consistence.svg?style=flat-square)](https://packagist.org/packages/ipub/doctrine-consistence)
[![License](https://img.shields.io/packagist/l/ipub/doctrine-consistence.svg?style=flat-square)](https://packagist.org/packages/ipub/doctrine-consistence)

Register [Consistence](https://github.com/consistence/consistence-doctrine) data types into [Doctrine2](http://www.doctrine-project.org/) entity repository. 

## Installation

The best way to install ipub/doctrine-consistence is using [Composer](http://getcomposer.org/):

```sh
$ composer require ipub/doctrine-consistence
```

After that you have to register extension in config.neon.

```neon
extensions:
	doctrineConsistence: IPub\DoctrineConsistence\DI\DoctrineConsistenceExtension
```

## Documentation

Learn how to use extended data types in [documentation](https://github.com/iPublikuj/doctrine-consistence/blob/master/docs/en/index.md).

***
Homepage [https://www.ipublikuj.eu](https://www.ipublikuj.eu) and repository [http://github.com/iPublikuj/doctrine-consistence](http://github.com/iPublikuj/doctrine-consistence).
