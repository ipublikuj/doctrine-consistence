# Doctrine 2 Consistence

[![Build Status](https://badgen.net/github/checks/ipublikuj/doctrine-consistence/master?cache=300&style=flast-square)](https://github.com/ipublikuj/doctrine-consistence)
[![Licence](https://badgen.net/packagist/license/ipub/doctrine-consistence?cache=300&style=flast-square)](https://github.com/ipublikuj/doctrine-consistence/blob/master/LICENSE.md)
[![Code coverage](https://badgen.net/coveralls/c/github/ipublikuj/doctrine-consistence?cache=300&style=flast-square)](https://coveralls.io/github/ipublikuj/doctrine-consistence)

![PHP](https://badgen.net/packagist/php/ipub/doctrine-consistence?cache=300&style=flast-square)
[![Downloads total](https://badgen.net/packagist/dt/ipub/doctrine-consistence?cache=300&style=flast-square)](https://packagist.org/packages/ipub/doctrine-consistence)
[![Latest stable](https://badgen.net/packagist/v/ipub/doctrine-consistence/latest?cache=300&style=flast-square)](https://packagist.org/packages/ipub/doctrine-consistence)
[![PHPStan](https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat-square)](https://github.com/phpstan/phpstan)

Register [Consistence](https://github.com/consistence-community/consistence-doctrine) data types into [Doctrine2](http://www.doctrine-project.org/) entity repository. 

## Installation

The best way to install **ipub/doctrine-consistence** is using [Composer](http://getcomposer.org/):

```sh
composer require ipub/doctrine-consistence
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
