# monolog-publish

[![Latest Version](https://img.shields.io/github/release/zae/monolog-publish.svg?style=flat-square)](https://github.com/zae/monolog-publish/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/Zae/monolog-publish/master.svg?style=flat-square)](https://travis-ci.org/Zae/monolog-publish)
[![Total Downloads](https://img.shields.io/packagist/dt/zae/monolog-publish.svg?style=flat-square)](https://packagist.org/packages/zae/monolog-publish)

A simple Monolog handler that can be used to 'publish' the errors to a subscriber.

## Publishers

Available publishers are:

- RedisPublisher

## Install

Via Composer

``` bash
$ composer require zae/monolog-publish
```

## Usage

``` php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Zae\Monolog\Publish\Handler\PublishHandler;
use Zae\Monolog\Publish\Publisher\RedisPublisher;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new PublishHandler(new RedisPublisher('log', Logger::WARNING)));

// add records to the log
$log->addWarning('Foo');
$log->addError('Bar');
```

## Testing

``` bash
$ phpunit
```

## Contributing

Contributions are welcome via pull requests on github.

Mostly new publishers are needed.

## Credits

- [Ezra Pool](https://github.com/Zae)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
