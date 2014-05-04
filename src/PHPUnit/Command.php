<?php

namespace Task\Plugin\PHPUnit;

use Task\Plugin\Process\ProcessBuilder;

class Command extends ProcessBuilder
{
    protected $testCase;
    protected $testFile;
    protected $setup = false;

    public function __construct($prefix = null)
    {
        parent::__construct();
        $this->setPrefix($prefix ?: 'phpunit');
    }

    public function getProcess()
    {
        if (!$this->setup) {
            if ($this->testCase) {
                $this->add($this->testCase);
            }

            if ($this->testFile) {
                $this->add($this->testFile);
            }

            $this->setup = true;
        }

        return parent::getProcess();
    }

    public function setTestCase($testCase)
    {
        $this->testCase = $testCase;
        return $this;
    }

    public function setTestFile($testFile)
    {
        $this->testFile = $testFile;
        return $this;
    }

    public function useColors()
    {
        return $this->add('--colors');
    }

    public function setBootstrap($bootstrap)
    {
        return $this->add('--bootstrap')->add($bootstrap);
    }

    public function setConfiguration($configuration)
    {
        return $this->add('--configuration')->add($configuration);
    }

    public function addCoverage($coverage)
    {
        return $this->add("--coverage-$coverage");
    }

    public function setIniValue($key, $value)
    {
        return $this->add('-d')->add("$key=$value");
    }

    public function useDebug()
    {
        return $this->add('--debug');
    }

    public function setFilter($filter)
    {
        return $this->add('--filter')->add($filter);
    }

    public function setTestsuite($testsuite)
    {
        return $this->add('--testsuite')->add($testsuite);
    }

    public function addGroups(array $groups)
    {
        return $this->add('--group')->add(implode(',', $groups));
    }

    public function excludeGroups(array $groups)
    {
        return $this->add('--exclude-group')->add(implode(',', $groups));
    }

    public function addTestSuffixes(array $testSuffixes)
    {
        return $this->add('--test-suffix')->add(implode(',', $testSuffixes));
    }

    public function setIncludePath($includePath)
    {
        return $this->add('--include-path')->add($includePath);
    }

    public function setPrinter($printer)
    {
        return $this->add('--printer')->add($printer);
    }
}
