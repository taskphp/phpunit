<?php

namespace Task\Plugin\PHPUnit;

class CommandTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $command = new Command;
        $this->assertInstanceOf('PHPUnit_TextUI_Command', $command);
    }

    public function testRun()
    {
        $cwd = getcwd();

        global $chdir;

        function chdir($dir) {
            global $chdir;
            $chdir[] = $dir;
        }

        $tmp = sys_get_temp_dir();

        $command = new Command;
        $command->setWorkingDirectory($tmp);

        ob_start();
        $command->run();
        ob_end_clean();

        $this->assertEquals([$tmp, $cwd], $chdir);
    }

    public function testArguments()
    {
        $command = (new Command)
            ->useColors()
            ->setBootstrap('bootstrap.php')
            ->setConfiguration('phpunit.xml')
            ->addCoverage('text')
            ->setIniValue('foo', 'bar')
            ->useDebug()
            ->setFilter('^test')
            ->setTestsuite('suite')
            ->addGroups(['foo', 'bar'])
            ->excludeGroups(['baz', 'wow'])
            ->addTestSuffixes(['phpt'])
            ->setIncludePath('/tmp')
            ->setPrinter('TestSuiteListener')
            ->setTestCase('TestCase')
            ->setTestFile('TestCase.php');

        $this->assertEquals([
            '--no-globals-backup',
            '--colors',
            '--bootstrap', 'bootstrap.php',
            '--configuration', 'phpunit.xml',
            '--coverage-text',
            '-d', 'foo=bar',
            '--debug',
            '--filter', '^test',
            '--testsuite', 'suite',
            '--group', 'foo,bar',
            '--exclude-group', 'baz,wow',
            '--test-suffix', 'phpt',
            '--include-path', '/tmp',
            '--printer', 'TestSuiteListener',
            'TestCase',
            'TestCase.php'
        ], $command->getArguments());
    }
}
