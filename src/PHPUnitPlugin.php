<?php

namespace Task\Plugin;

use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;

class PHPUnitPlugin implements PluginInterface
{
    protected $prefix;

    public function __construct($prefix = null)
    {
        $this->prefix = $prefix;
    }

    public function getCommand()
    {
        return new PHPUnit\Command($this->prefix);
    }
}
