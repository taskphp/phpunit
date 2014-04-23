<?php

namespace Task\Plugin\PHPUnit;

class ResultPrinterTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $printer = new \PHPUnit_Util_Printer;
        $output = $this->getMock('Task\Plugin\Console\Output\Output');
        $resultPrinter = new ResultPrinter($output, $printer);

        $this->assertEquals($printer, $resultPrinter->getPrinter());
        $this->assertEquals($output, $resultPrinter->getOutput());
    }

    public function testWrite()
    {
        $printer = $this->getMock('PHPUnit_Util_Printer', ['write']);
        $output = $this->getMock('Task\Plugin\Console\Output\Output', ['write']);
        $resultPrinter = new ResultPrinter($output, $printer);

        $buffer = 'foo';
        $printer->expects($this->once())->method('write')
            ->with($buffer)
            ->will($this->returnCallback(function ($buffer) {
                echo $buffer;
            }));
        $output->expects($this->once())->method('write')
            ->with($buffer);

        $resultPrinter->write($buffer);
    }
}
