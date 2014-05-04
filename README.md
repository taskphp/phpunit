task/phpunit
============

[![Build Status](https://travis-ci.org/taskphp/phpunit.svg?branch=master)](https://travis-ci.org/taskphp/phpunit)
[![Coverage Status](https://coveralls.io/repos/taskphp/phpunit/badge.png?branch=master)](https://coveralls.io/r/taskphp/phpunit?branch=master)

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
Given:
```php
$project->addTask('phpunit', ['phpunit', function ($phpunit) {
    $phpunit->getCommand()
    ...
```
#### setTestCase
```php
->setTestCase('MyTest')
```
```bash
$> phpunit MyTest
```
#### setTestFile
```php
->setTestFile('MyTest.php')
```
```bash
$> phpunit MyTest.php
```
#### useColors
```php
->useColors()
```
```bash
$> phpunit --colors
```
#### setBootstrap
```php
->setBootstrap('bootstrap.php')
```
```bash
$> phpunit --bootstrap bootstrap.php
```
#### setConfiguration
```php
->setConfiguration('phpunit.xml')
```
```bash
$> phpunit --configuration phpunit.xml
```
#### addCoverage
```php
->addCoverage('html')
```
```bash
$> phpunit --coverage-html
```
#### setInitValue
```php
->setIniValue('foo', 'bar')
```
```bash
$> phpunit -d foo=bar
```
#### useDebug
```php
->useDebug()
```
```bash
$> phpunit --debug
```
#### setFilter
```php
->setFilter('/foo/')
```
```bash
$> phpunit --filter /foo/
```
#### setTestsuite
```php
->setTestsuite('unit')
```
```bash
$> phpunit --testsuite unit
```
#### addGroups
```php
->addGroups(['foo', 'bar'])
```
```bash
$> phpunit --group foo,bar
```
#### excludeGroups
```php
->excludeGroups(['foo', 'bar'])
```
```bash
$> phpunit --exclude-group foo,bar
```
#### addTestSuffixes
```php
->addTestSuffixes(['.phpt', '.php'])
```
```bash
$> phpunit --test-suffix .phpt,.php
```
#### setIncludePath
```php
->setIncludePath('./src')
```
```bash
$> phpunit --include-path ./src
```
#### setPrinter
```php
->setPrinter('MyPrinter')
```
```bash
$> phpunit --printer MyPrinter
```
