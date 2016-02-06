<?php

namespace NumberFormatter;

use InvalidArgumentException;

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
            if (!preg_match('/^(M{0,3})(D?C{0,3}|C[DM])(L?X{0,3}|X[LC])(V?I{0,3}|I[VX])$/', $number)) {
                throw new InvalidStringException(sprintf("String \"%s\" is not valid roman number", $number));
            }
            $this->parseRoman($number);
        } elseif (is_int($number)) {
            if($number < 0) {
                throw new InvalidIntException(sprintf("Int argument mus be >0", $number));
            }
            $this->parseInt($number);
        } else {
            throw new InvalidArgumentException(sprintf("Argument must be string or int, %s given", gettype($number)));
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
     * Get roman number
     *
     * @return string
     */
    public function toString()
    {
        return $this->__toString();
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
