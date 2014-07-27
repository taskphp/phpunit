<?php

namespace spec\Task\Plugin\PHPUnit;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Task\Plugin\PHPUnit\Command');
    }

    function it_sets_default_prefix()
    {
        $this->getProcess()->getCommandLine()->shouldReturn("'./vendor/bin/phpunit'");
    }

    function it_should_add_arguments()
    {
        $this
            ->useColors()
            ->setBootstrap('bootstrap.php')
            ->setConfiguration('phpunit.xml')
            ->addCoverage('text', 'php://stdout')
            ->setIniValue('foo', 'bar')
            ->useDebug()
            ->setFilter('^test')
            ->setTestsuite('suite')
            ->addGroups(['foo', 'bar'])
            ->excludeGroups(['baz', 'wow'])
            ->addTestSuffixes(['phpt'])
            ->setIncludePath('/tmp')
            ->setPrinter('TestSuiteListener')
            ->useTap()
            ->setTestCase('TestCase')
            ->setTestFile('TestCase.php');

        $commandline = implode(' ', array_map(function ($arg) {
            return "'$arg'";
        }, [
            './vendor/bin/phpunit',
            '--colors',
            '--bootstrap', 'bootstrap.php',
            '--configuration', 'phpunit.xml',
            '--coverage-text', 'php://stdout',
            '-d', 'foo=bar',
            '--debug',
            '--filter', '^test',
            '--testsuite', 'suite',
            '--group', 'foo,bar',
            '--exclude-group', 'baz,wow',
            '--test-suffix', 'phpt',
            '--include-path', '/tmp',
            '--printer', 'TestSuiteListener',
            '--tap',
            'TestCase',
            'TestCase.php'
        ]));

        $this->getProcess()->getCommandLine()->shouldReturn($commandline);
    }
}
