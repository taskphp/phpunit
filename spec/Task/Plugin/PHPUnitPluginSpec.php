<?php

namespace spec\Task\Plugin;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PHPUnitPluginSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Task\Plugin\PHPUnitPlugin');

    }

    function it_should_create_a_command()
    {
        $this->getCommand()->shouldReturnAnInstanceOf('Task\Plugin\PHPUnit\Command');
    }

    function it_should_pass_a_prefix()
    {
        $this->beConstructedWith('foo');
        $this->getCommand()->getProcess()->getCommandLine()->shouldReturn("'foo'");
    }
}
