<?php

use NumberFormatter\RomanNumber;

require_once __DIR__ . '/../vendor/autoload.php';

class RomanNumberTest extends PHPUnit_Framework_TestCase
{

    public function testFormatter()
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

}