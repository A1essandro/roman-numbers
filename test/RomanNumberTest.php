<?php

use NumberFormatter\RomanNumber;

class RomanNumberTest extends PHPUnit_Framework_TestCase
{

    public function testFormatterEquals()
    {
        for ($i = 1; $i <= 2000; $i++) {
            $romanFromInt = new RomanNumber($i);
            $intFromRoman = new RomanNumber((string)$romanFromInt);
            $this->assertEquals($romanFromInt->toInt(), $intFromRoman->toInt());
            $this->assertEquals($romanFromInt->toString(), (string)$intFromRoman);
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

    public function testStringValidation()
    {
        $this->assertEquals(RomanNumber::isValidRomanNumber('XDI'), false);
        $this->assertEquals(RomanNumber::isValidRomanNumber('XXIX'), true);
    }

}