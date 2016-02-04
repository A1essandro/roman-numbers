<?php

namespace NumberFormatter;

class RomanNumber
{

    private $ref
        = array(
            1    => 'I',
            4    => 'IV',
            5    => 'V',
            9    => 'IX',
            10   => 'X',
            40   => 'XL',
            50   => 'L',
            90   => 'XC',
            100  => 'C',
            400  => 'CD',
            500  => 'D',
            900  => 'CM',
            1000 => 'M'
        );

    /**
     * @var string
     */
    private $stringData;

    /**
     * @var int
     */
    private $intData;

    /**
     * @param int|string $number
     */
    public function __construct($number)
    {
        if (is_string($number)) {
            $this->parseRoman($number);
        }

        if (is_int($number)) {
            $this->parseInt($number);
        }
    }


    /**
     * Get roman number
     *
     * @return string
     */
    public function __toString()
    {
        return $this->stringData;
    }

    /**
     * Get integer value of roman number
     *
     * @return int
     */
    public function toInt()
    {
        return $this->intData;
    }

    private function parseRoman($number)
    {
        $this->stringData = $number;

        $len = strlen($number);
        $this->intData = $next = 0;
        for ($i = $len - 1; $i >= 0; $i--) {
            $currentInt = array_search($number[$i], $this->ref);
            $module = $next > $currentInt ? -1 : 1;
            $this->intData += $module * $currentInt ?: 0;
            $next = $currentInt;
        }
    }

    private function parseInt($number)
    {
        $this->intData = $number;

        $accords = $this->ref;
        krsort($accords);

        $this->stringData = '';

        foreach ($accords as $int => $roman) {
            $multiplier = floor($number / $int);
            $number = $number % $int;
            $this->stringData .= str_repeat($roman, $multiplier);
        }
    }

}
