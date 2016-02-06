<?php

use NumberFormatter\RomanNumber;

class RomanNumberTest extends PHPUnit_Framework_TestCase
{

    public function testFormatterEquals()
    {
        $i = 1;
        while ($i <= 2000) {
            $romanFromInt = new RomanNumber($i);
            $intFromRoman = new RomanNumber((string)$romanFromInt);
            $this->assertEquals($romanFromInt->toInt(), $intFromRoman->toInt());
            $this->assertEquals((string)$romanFromInt, (string)$intFromRoman);
            $i += 1;
        }
    }

    /**
     * @expectedException NumberFormatter\InvalidIntException
     */
    public function testInvalidInt()
    {
        new RomanNumber(-1);
    }

    /**
     * @expectedException NumberFormatter\InvalidStringException
     */
    public function testInvalidString()
    {
        new RomanNumber('XD');
    }

    public function providerSetInvalidArgument()
    {
        return array(
            array(array()),
            array(null),
            array(new StdClass()),
            array(12.5)
        );
    }

    /**
     * @dataProvider providerSetInvalidArgument
     * @expectedException InvalidArgumentException
     */
    public function testSetInvalidArgument($argument)
    {
        new RomanNumber($argument);
    }

}