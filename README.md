task/phpunit
============

[![Build Status](https://travis-ci.org/taskphp/phpunit.svg?branch=master)](https://travis-ci.org/taskphp/phpunit)
[![Coverage Status](https://coveralls.io/repos/taskphp/phpunit/badge.png?branch=master)](https://coveralls.io/r/taskphp/phpunit?branch=master)

Installation
============

Install via Composer:
```json
...
    "require-dev": {
        "task/phpunit": "~0.2"
    }
...
```

Example
=======
```php
use Task\Plugin\PHPUnitPlugin;

$project->inject(function ($container) {
    $container['phpunit'] = new PHPUnitPlugin;
});

$project->addTask('phpunit', ['phpunit', function ($phpunit) {
    $phpunit->getCommand()
        ->useColors()
        ->setBootstrap('tests/bootstrap.php')
        ->pipe($this->getOutput());
}]);
```

Usage
=====
```php
setTestCase('MyTest')
```
```bash
$> phpunit MyTest
```
```php
setTestFile('MyTest.php')
```
```bash
$> phpunit MyTest.php
```
```php
useColors()
```
```bash
$> phpunit --colors
```
```php
setBootstrap('bootstrap.php')
```
```bash
$> phpunit --bootstrap bootstrap.php
```
```php
setConfiguration('phpunit.xml')
```
```bash
$> phpunit --configuration phpunit.xml
```
```php
addCoverage('html')
```
```bash
$> phpunit --coverage-html
```
```php
setIniValue('foo', 'bar')
```
```bash
$> phpunit -d foo=bar
```
```php
useDebug()
```
```bash
$> phpunit --debug
```
```php
setFilter('/foo/')
```
```bash
$> phpunit --filter /foo/
```
```php
setTestsuite('unit')
```
```bash
$> phpunit --testsuite unit
```
```php
addGroups(['foo', 'bar'])
```
```bash
$> phpunit --group foo,bar
```
```php
excludeGroups(['foo', 'bar'])
```
```bash
$> phpunit --exclude-group foo,bar
```
```php
addTestSuffixes(['.phpt', '.php'])
```
```bash
$> phpunit --test-suffix .phpt,.php
```
```php
setIncludePath('./src')
```
```bash
$> phpunit --include-path ./src
```
```php
setPrinter('MyPrinter')
```
```bash
$> phpunit --printer MyPrinter
```
